<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blogs()
    {

        $blogs = DB::table('blog')->orderBy('idblog', 'desc')->get();
        $data = [
            'blogs' => $blogs,
        ];
        return view('home.blog.blog', $data);
    }

    public function isiblog($id)
    {
        $blog = DB::table('blog')->where('idblog', $id)->first();
        $data = [
            'blog' => $blog,
        ];
        return view('home.blog.isiblog', $data);
    }

    public function Blog()
    {
        $blogs = DB::table('blog')->get();
        $data['blogs'] = $blogs;
        return view('admin.blog.blog', $data);
    }

    public function tambahblog()
    {
        return view('admin.blog.tambahblog');
    }

    public function simpanblog(Request $request)
    {
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];


        $dayName = $days[date('l')];
        $day = date('d');
        $month = $months[date('F')];
        $year = date('Y');

        $tanggal = "$dayName, $day $month $year";

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => 'Table :attribute Belum Diisi.',
            'numeric' => 'Table :attribute Harus Berupa Angka.',
            'integer' => 'Table :attribute Harus Berupa Angka.',
            'url' => 'Table :attribute Harus Berupa URL Yang Valid.',
            'image' => 'Table :attribute Harus Berupa Gambar.',
            'mimes' => 'Table :attribute Harus Berupa File Dengan Format: jpeg, png, jpg, gif.',
            'max' => 'Table :attribute Maksimal Yang Diperbolehkan Adalah :max KB Atau 2 MB.',
        ]);

        if ($request->hasFile('foto')) {
            $namafoto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto'), $namafoto);
        } else {
            return redirect()->back()->withInput()->withErrors(['foto' => 'Foto tidak ditemukan']);
        }

        DB::table('blog')->insert([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $namafoto,
            'tanggal' => $tanggal,

        ]);

        session()->flash('alert', 'blog berhasil ditambahkan. 😊');


        return redirect('admin/blog');
    }

    public function ubahblog($id)
    {
        $data['blog'] = DB::table('blog')->where('idblog', $id)->first();

        return view('admin.blog.ubahblog', $data);
    }

    public function updateblog(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => 'Table :attribute Belum Diisi.',
            'numeric' => 'Table :attribute Harus Berupa Angka.',
            'integer' => 'Table :attribute Harus Berupa Angka.',
            'url' => 'Table :attribute Harus Berupa URL Yang Valid.',
            'image' => 'Table :attribute Harus Berupa Gambar.',
            'mimes' => 'Table :attribute Harus Berupa File Dengan Format: jpeg, png, jpg, gif.',
            'max' => 'Table :attribute Maksimal Yang Diperbolehkan Adalah :max KB Atau 2 MB.',
        ]);


        $blog = DB::table('blog')->where('idblog', $id)->first();

        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),

        ];

        if ($request->hasFile('foto')) {
            $namafoto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto'), $namafoto);
            $data['foto'] = $namafoto;
        }

        DB::table('blog')->where('idblog', $id)->update($data);

        session()->flash('alert', 'Blog berhasil dirubah! 😊');

        return redirect('admin/blog');
    }

    public function hapusblog($id)
    {
        DB::table('blog')->where('idblog', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/blog');
    }
}
