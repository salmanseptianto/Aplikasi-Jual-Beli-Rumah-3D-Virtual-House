<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function akun()
    {
        if (session()->has('admin')) {
            $admin = session('admin');
            if (property_exists($admin, 'id')) {
                $idpengguna = $admin->id;
            } else {
                echo "Maaf ID Anda Tidak Ditemukan.";
            }
        } else {
            echo "Sesi 'admin' tidak tersedia.";
        }

        $idpengguna = session('admin')->id;
        $pengguna = DB::table('pengguna')->where('id', $idpengguna)->first();

        $data = [
            'pengguna' => $pengguna,
        ];
        return view('admin.akun', $data);
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
        return redirect('admin/akun');
    }

    public function properti()
    {
        $properti = DB::table('properti')->get();
        $data['properti'] = $properti;
        return view('admin.properti', $data);
    }

    public function tambahproperti()
    {
        return view('admin.tambahproperti');
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
            'links' => $request->input('links'),
            'checkout_status' => 0,
        ]);

        session()->flash('alert', 'Properti berhasil ditambahkan. 😊');

        return redirect('admin/properti');
    }

    public function ubahproperti($id)
    {
        $data['properti'] = DB::table('properti')->where('idproperti', $id)->first();

        return view('admin.ubahproperti', $data);
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
        return redirect('admin/properti');
    }

    public function hapusproperti($id)
    {
        DB::table('properti')->where('idproperti', $id)->delete();
        session()->flash('alert', 'Berhasil menghapus data!');
        return redirect('admin/properti');
    }

    public function pengguna()
    {
        $pengguna = DB::table('pengguna')->where('level', 'Pelanggan')->get();

        $data = [
            'pengguna' => $pengguna,
        ];

        return view('admin.pengguna', $data);
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
        return view('admin.pembelian', $data);
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

        $idpengguna = session('admin')->id;
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

        return view('admin.pembayaran', $data);
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

            return redirect('admin/pembelian');
        }
    }
}
