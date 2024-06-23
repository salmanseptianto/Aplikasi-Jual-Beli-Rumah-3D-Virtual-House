<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{

    public function index()
    {
        return view('agent.dashboard');
    }

    public function akun()
    {
        if (session()->has('agent')) {
            $agent = session('agent');
            if (property_exists($agent, 'id')) {
                $idpengguna = $agent->id;
            } else {
                echo "Maaf ID Anda Tidak Ditemukan.";
            }
        } else {
            echo "Sesi 'agent' tidak tersedia.";
        }

        $idpengguna = session('agent')->id;
        $pengguna = DB::table('pengguna')->where('id', $idpengguna)->first();

        $data = [
            'pengguna' => $pengguna,
        ];
        return view('agent.akun', $data);
    }

    public function ubahakun(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'fotoprofil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => 'Table :attribute belum diisi.',
            'numeric' => 'Table :attribute Harus Berupa Angka.',
            'email' => 'Table :attribute harus berupa alamat email yang valid.',
            'image' => 'Table :attribute harus berupa gambar.',
            'mimes' => 'Table :attribute harus berupa file dengan format: jpeg, png, jpg, gif.',
            'max' => ':attribute Tidak Boleh Melebihi Dari :max KB atau 2 MB.',
        ]);

        $pengguna = DB::table('pengguna')->where('id', $id)->first();

        $password = $request->input('password');
        if (empty($password)) {
            $password = $pengguna->password;
        }

        $fotoprofil = $pengguna->fotoprofil;
        if ($request->hasFile('fotoprofil')) {
            $namafoto = $request->file('fotoprofil')->getClientOriginalName();
            $namafix = date("YmdHis") . $namafoto;
            $request->file('fotoprofil')->move('foto', $namafix);
            $fotoprofil = $namafix;
        }

        DB::table('pengguna')
            ->where('id', $id)
            ->update([
                'password' => $password,
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'fotoprofil' => $fotoprofil,
                'telepon' => $request->input('telepon'),
                'alamat' => $request->input('alamat'),
            ]);

        session()->flash('success', 'Data pengguna berhasil diperbarui.');
        return redirect('agent/akun');
    }
    public function Blog()
    {
        $blogs = DB::table('blog')->get();
        $data['blogs'] = $blogs;
        return view('agent.blog.blog', $data);
    }

    public function tambahblog()
    {
        return view('agent.blog.tambahblog');
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


        return redirect('agent/blog');
    }

    public function ubahblog($id)
    {
        $data['blog'] = DB::table('blog')->where('idblog', $id)->first();

        return view('agent.blog.ubahblog', $data);
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

        return redirect('agent/blog');
    }

    public function hapusblog($id)
    {
        DB::table('blog')->where('idblog', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('agent/blog');
    }
    public function properti()
    {
        $properti = DB::table('properti')->get();
        $data['properti'] = $properti;
        return view('agent.properti', $data);
    }

    public function tambahproperti()
    {
        return view('agent.tambahproperti');
    }

    public function simpanproperti(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'luas' => 'required|string',
            'perumahan' => 'required|string',
            'kamartidur' => 'required|integer',
            'kamarmandi' => 'required|integer',
            'tipe' => 'required|string|max:255',
            'fitur' => 'required|string',
            'kapling' => 'required|string',
            'links' => 'required|url',
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


        $namafoto = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('foto'), $namafoto);

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

        DB::table('properti')->insert([
            'namaproperti' => $request->input('nama'),
            'hargaproperti' => $request->input('harga'),
            'fotoproperti' => $namafoto,
            'deskripsiproperti' => $request->input('deskripsi'),
            'kamartidur' => $request->input('kamartidur'),
            'kamarmandi' => $request->input('kamarmandi'),
            'tipe' => $request->input('tipe'),
            'luas' => $request->input('luas'),
            'perumahan' => $request->input('perumahan'),
            'fitur' => $request->input('fitur'),
            'kapling' => $request->input('kapling'),
            'links' => $request->input('links'),
            'checkout_status' => 0,
            'tanggal' => $tanggal,
        ]);

        session()->flash('alert', 'Properti berhasil ditambahkan. 😊');

        return redirect('agent/properti');
    }

    public function ubahproperti($id)
    {
        $data['properti'] = DB::table('properti')->where('idproperti', $id)->first();

        return view('agent.ubahproperti', $data);
    }

    public function updateproperti(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'kamartidur' => 'required|integer',
            'kamarmandi' => 'required|integer',
            'tipe' => 'required|string|max:255',
            'fitur' => 'required|string',
            'daerah' => 'required|string',
            'luas' => 'required|string',
            'perumahan' => 'required|string',
            'links' => 'required|url',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => 'Table :attribute Belum Diisi.',
            'numeric' => 'Table :attribute Harus Berupa Angka.',
            'integer' => 'Table :attribute Harus Berupa Angka.',
            'url' => 'Table :attribute Harus Berupa URL Yang Valid.',
            'image' => 'Table :attribute Harus Berupa Gambar.',
            'mimes' => 'Table :attribute Harus Berupa File Dengan Format: jpeg, png, jpg, gif.',
            'max' => 'Table :attribute Tidak Boleh Melebihi Dari :max KB Atau 2 MB.',
        ],);

        $data = [
            'namaproperti' => $request->input('nama'),
            'hargaproperti' => $request->input('harga'),
            'deskripsiproperti' => $request->input('deskripsi'),
            'kamartidur' => $request->input('kamartidur'),
            'kamarmandi' => $request->input('kamarmandi'),
            'tipe' => $request->input('tipe'),
            'luas' => $request->input('luas'),
            'perumahan' => $request->input('perumahan'),
            'fitur' => $request->input('fitur'),
            'daerah' => $request->input('daerah'),
            'links' => $request->input('links'),
        ];

        $properti = DB::table('properti')->where('idproperti', $id)->first();

        if ($request->hasFile('foto')) {
            $namafoto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto'), $namafoto);
            $data['fotoproperti'] = $namafoto;
        }

        DB::table('properti')->where('idproperti', $id)->update($data);
        session()->flash('alert', 'Properti berhasil dirubah! 😊');
        return redirect('agent/properti');
    }

    public function hapusproperti($id)
    {
        DB::table('properti')->where('idproperti', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('agent/properti');
    }

    public function pengguna()
    {
        $pengguna = DB::table('pengguna')->where('level', 'Pelanggan')->get();

        $data = [
            'pengguna' => $pengguna,
        ];

        return view('agent.pengguna', $data);
    }

    public function hapuspengguna($id)
    {
        DB::table('pengguna')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }

    public function logout()
    {
        session()->flush();
        return redirect('home')->with('alert', 'Anda Telah Logout');
    }

    public function pembelian()
    {
        $pembelian = DB::table('pembelian')->join('pengguna', 'pengguna.id', '=', 'pembelian.id')
            ->orderBy('pembelian.tanggalbeli', 'desc')->orderBy('pembelian.idpembelian', 'desc')->get();

        $dataproperti = [];
        foreach ($pembelian as $row) {
            $idpembelian = $row->idpembelian;
            $properti = DB::table('pembelianproperti')
                ->join('properti', 'pembelianproperti.idproperti', '=', 'properti.idproperti')
                ->where('idpembelian', $idpembelian)
                ->get();
            $dataproperti[$idpembelian] = $properti;
        }

        $data = [
            'pembelian' => $pembelian,
            'dataproperti' => $dataproperti,
        ];
        return view('agent.pembelian', $data);
    }

    public function pembayaran($id)
    {

        $datapembelian = DB::table('pembelian')
            ->join('pengguna', 'pengguna.id', '=', 'pembelian.id')
            ->where('pembelian.idpembelian', $id)
            ->first();

        $dataproperti = DB::table('pembelianproperti')
            ->join('properti', 'pembelianproperti.idproperti', '=', 'properti.idproperti')
            ->where('idpembelian', $id)
            ->get();

        $pembayaran = DB::table('pembayaran')
            ->where('idpembelian', $id)
            ->first();

        $pengguna = DB::table('pengguna')->get();

        $idpengguna = session('agent')->id;
        $pengguna = DB::table('pengguna')->where('id', $idpengguna)->first();

        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Status Pembayaran Belum Diisi Oleh User 😊');
        }
        $data = [

            'datapembelian' => $datapembelian,
            'dataproperti' => $dataproperti,
            'pembayaran' => $pembayaran,
            'pengguna' => $pengguna,
        ];

        return view('agent.pembayaran', $data);
    }

    public function simpanpembayaran($id, Request $request)
    {
        if ($request->has('proses')) {
            $statusbeli = $request
                ->input('statusbeli');

            $pembelian = DB::table('pembelian')
                ->where('idpembelian', $id)
                ->update([
                    'statusbeli' => $statusbeli,
                ]);

            $pembelian_properti = DB::table('pembelianproperti')
                ->where('idpembelian', $id)
                ->first();

            if ($statusbeli === 'Selesai') {
                $properti = DB::table('properti')
                    ->where('idproperti', $pembelian_properti->idproperti)
                    ->update([
                        'checkout_status' => 1,
                    ]);
            } else {
                $properti = DB::table('properti')
                    ->where('idproperti', $pembelian_properti->idproperti)
                    ->update([
                        'checkout_status' => 0,
                    ]);
            }

            return redirect('agent/pembelian');
        }
    }
}
