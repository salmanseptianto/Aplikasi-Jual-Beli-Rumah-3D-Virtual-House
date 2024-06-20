<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function cari(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
        $perumahan = $request->input('perumahan');
        $tipe = $request->input('tipe');
        $range_harga = $request->input('range_harga');

        $query = Properti::where('perumahan', $perumahan !== null ? $perumahan : 0 );

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('namaproperti', 'LIKE', "%$search%")
                    ->orWhere('deskripsiproperti', 'LIKE', "%$search%");
            });
        }
       
        if ($tipe) {
            $tipeRange = explode('-', $tipe);
            if (count($tipeRange) == 2) {
                $query->whereBetween('tipe');
            } else {
                $query->where('tipe', $tipe);
            }
        }

        if ($range_harga) {
            [$min, $max] = explode('-', $range_harga);
            $query->whereBetween('hargaproperti', [(int)$min, (int)$max]);
        }

        $propertis = $query->paginate(12);

        return view('home.properti', compact('propertis'));
    }

    public function buy(Properti $properti)
    {
        $properti->checkoutstatus();
        return redirect()->route('properti.index');
    }

    public function index()
    {
        $propertis = DB::table('properti')->where('checkout_status', 0)->paginate(3);
        $data = [
            'properti' => $propertis,
        ];

        return view('home/index', $data);
    }

    public function properti()
    {
        $propertis = DB::table('properti')->where('checkout_status', 0)->paginate(12);
        return view('home.properti', compact('propertis'));
    }

    public function detail($id)
    {
        $properti = DB::table('properti')->where('idproperti', $id)->first();
        $data = [
            'properti' => $properti,
        ];
        return view('home.detail', $data);
    }

    public function daftar()
    {
        return view('home.daftar');
    }

    public function dodaftar(Request $request)
    {
        $requiredFields = ['nama', 'email', 'alamat', 'telepon', 'foto', 'password'];
        foreach ($requiredFields as $field) {
            if (empty($request->$field)) {
                return redirect()->back()->with('alert', 'Mohon isi data terlebih dahulu');
            }
        }

        $namafoto = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('foto'), $namafoto);

        $kelamin = $request->input('kelamin');

        if (strlen($request->password) < 6) {
            return redirect()->back()->with('alert', 'Password harus terdiri dari minimal 6 karakter');
        }

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'fotoprofil' => $namafoto,
            'password' => $request->password,
            'level' => 'Pelanggan',
            'kelamin' => 'null',
        ];

        $existingUser = DB::table('pengguna')->where('email', $request->email)->count();

        if ($existingUser == 1) {
            return redirect()->back()->with('alert', 'Pendaftaran Gagal, email sudah ada');
        } else {
            DB::table('pengguna')->insert($data);

            return redirect('home/login')->with('alert', 'Pendaftaran Berhasil');
        }
    }

    public function login()
    {
        return view('home.login');
    }

    public function dologin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($akun) {
            if ($akun->level == "Pelanggan") {
                session(['pengguna' => $akun]);
                return redirect('home')->with('alert', 'Selamat Anda Berhasil Login');
            } elseif ($akun->level == "Admin") {
                session(['admin' => $akun]);
                return redirect('admin')->with('alert', 'Selamat Anda Berhasil Login');
            }
        } else {
            return redirect()->back()->with('alert', 'Email atau Password anda salah');
        }
    }

    public function logout()

    {
        session()->flush();
        return redirect('home')->with('alert', 'Anda Telah Logout');
    }

    public function akun()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda Belum Login Silahkan Login Terlebih Dahulu 😁');
            return redirect('home/login');
        }

        $idpengguna = session('pengguna')->id;
        $pengguna = DB::table('pengguna')->where('id', $idpengguna)->first();

        $data = [
            'pengguna' => $pengguna,
        ];
        return view('home.akun', $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $properti = Properti::where('namaproperti', 'LIKE', "%$search%")
            ->orWhere('deskripsiproperti', 'LIKE', "%$search%")
            ->get();

        return view('properti.index', compact('properti'));
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
        return redirect('home/akun');
    }

    public function pesan(Request $request)
    {
        if (!session('pengguna')) {
            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }

        $idproperti = $request->input('idproperti');
        $jumlah = $request->input('jumlah');
        $keranjang = session()->get('keranjang', []);

        $idpengguna = session('pengguna')->id;

        $riwayat = DB::table('pembelianproperti')
            ->join('pembelian', 'pembelianproperti.idpembelian', '=', 'pembelian.idpembelian')
            ->where('pembelian.id', $idpengguna)
            ->where('pembelianproperti.idproperti', $idproperti)
            ->select('pembelian.statusbeli')
            ->get();

        $bolehMemesan = true;
        $pesan = 'Properti sudah ada dalam riwayat pembelian mohon lengkapi berkas berkas terlebih dahulu.';

        foreach ($riwayat as $r) {
            if ($r->statusbeli === 'Pesanan Di Tolak') {
                $bolehMemesan = true;
            } elseif ($r->statusbeli === 'Sudah Upload Bukti Pembayaran') {
                $bolehMemesan = false;
                $pesan = 'Properti sudah ada dalam riwayat pembelian mohon menunggu konfirmasi dari admin.';
                break;
            } else {
                $bolehMemesan = false;
                break;
            }
        }

        if (!$bolehMemesan) {
            session()->flash('alert', $pesan);
        } else {
            if (isset($keranjang[$idproperti])) {
                session()->flash('alert', 'Properti sudah ada di dalam keranjang.');
            } else {
                $keranjang[$idproperti] = $jumlah;
                session(['keranjang' => $keranjang]);
                session()->flash('alert', 'Berhasil menambahkan properti ke keranjang.');
            }
        }

        return redirect('home/properti');
    }

    public function keranjang()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $keranjang = session()->get('keranjang');
        $data = [
            'keranjang' => $keranjang,
        ];

        return view('home.keranjang', $data);
    }

    public function hapuskeranjang($id)
    {
        $keranjang = session()->get('keranjang');

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session(['keranjang' => $keranjang]);
        }
        return redirect('home/keranjang');
    }

    public function checkout()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $keranjang = session()->get('keranjang');
        $data['keranjang'] = $keranjang;

        $caripengguna = session('pengguna')->id;
        $pengguna = DB::table('pengguna')->where('id', $caripengguna)->first();
        $data['pengguna'] = $pengguna;
        return view('home.checkout', $data);
    }

    public function docheckout(Request $request)
    {
        $notransaksi = '#TP' . date("Ymdhis");
        $id = session('pengguna')->id;
        $tanggalbeli = date("Y-m-d");
        $waktu = date("Y-m-d H:i:s");
        $totalbeli = $request->input('dua');
        $alamatpengirim = $request->input('alamat');

        DB::table('pembelian')->insert([
            'notransaksi' => $notransaksi,
            'id' => $id,
            'tanggalbeli' => $tanggalbeli,
            'totalbeli' => $totalbeli,
            'alamat' => $alamatpengirim,
            'statusbeli' => 'Belum Bayar',
            'waktu' => $waktu
        ]);

        $keranjang = session()->get('keranjang');
        $idpembelian = DB::getPdo()->lastInsertId();

        foreach ($keranjang as $idproperti => $jumlah) {
            $properti = DB::table('properti')->where('idproperti', $idproperti)->first();
            $idproperti = $properti->idproperti;
            $nama = $properti->namaproperti;
            $harga = $properti->hargaproperti;

            $subharga = $properti->hargaproperti * $jumlah;

            DB::table('pembelianproperti')->insert([
                'idpembelian' => $idpembelian,
                'idproperti' => $idproperti,
                'nama' => $nama,
                'harga' => $harga,
                'subharga' => $subharga,
                'jumlah' => $jumlah,
            ]);
        }

        session()->forget('keranjang');
        session()->flash('alert', 'Berhasil Checkout');
        return redirect('home/riwayat');
    }

    public function riwayat()
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $idpengguna = session('pengguna')->id;
        $databeli = DB::table('pembelian')
            ->leftJoin('pembayaran', 'pembelian.idpembelian', '=', 'pembayaran.idpembelian')
            ->select('*', 'pembelian.idpembelian as idpembelianreal')
            ->where('pembelian.id', $idpengguna)
            ->orderBy('pembelian.tanggalbeli', 'desc')
            ->orderBy('pembelian.idpembelian', 'desc')
            ->get();

        $dataproperti = [];
        foreach ($databeli as $row) {
            $idpembelian = $row->idpembelianreal;
            $properti = DB::table('pembelianproperti')
                ->join('properti', 'pembelianproperti.idproperti', '=', 'properti.idproperti')
                ->where('idpembelian', $idpembelian)
                ->get();
            $dataproperti[$idpembelian] = $properti;
        }

        $data = [
            'databeli' => $databeli,
            'dataproperti' => $dataproperti,
        ];

        return view('home.riwayat', $data);
    }

    public function pembayaran($id)
    {
        if (!session('pengguna')) {

            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('home/login');
        }
        $datapembelian = DB::table('pembelian')
            ->join('pengguna', 'pengguna.id', '=', 'pembelian.id')
            ->where('pembelian.idpembelian', $id)
            ->first();

        $dataproperti = DB::table('pembelianproperti')
            ->join('properti', 'pembelianproperti.idproperti', '=', 'properti.idproperti')
            ->where('idpembelian', $id)
            ->get();

        $data = [
            'datapembelian' => $datapembelian,
            'dataproperti' => $dataproperti,
        ];

        return view('home.pembayaran', $data);
    }

    public function pembayaransimpan(Request $request)
    {
        // Validate the request to accept image and PDF files
        $request->validate([
            'bukti' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'ktp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'kk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'suratnikah' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'npwp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'bpjs' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'sk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'gaji' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'rekening' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'type' => 'required|string',
        ]);

        // Function to save files and return the new filename
        function saveFile($file, $prefix)
        {
            $originalName = $file->getClientOriginalName();
            $newName = date("YmdHis") . $prefix . $originalName;
            $file->move('foto', $newName);
            return $newName;
        }

        // Save all files with unique names
        $namafix = saveFile($request->file('bukti'), '_bukti_');
        $nama1 = saveFile($request->file('ktp'), '_ktp_');
        $nama2 = saveFile($request->file('kk'), '_kk_');
        $nama3 = saveFile($request->file('suratnikah'), '_suratnikah_');
        $nama4 = saveFile($request->file('npwp'), '_npwp_');
        $nama5 = saveFile($request->file('bpjs'), '_bpjs_');
        $nama6 = saveFile($request->file('sk'), '_sk_');
        $nama7 = saveFile($request->file('gaji'), '_gaji_');
        $nama8 = saveFile($request->file('rekening'), '_rekening_');

        // Get the rest of the input data
        $idpembelian = $request->input('idpembelian');
        $nama = $request->input('nama');
        $tanggaltransfer = $request->input('tanggaltransfer');
        $tanggal = date("Y-m-d");
        $type = $request->input('type');

        // Prepare the data array for insertion
        $data = [
            'idpembelian' => $idpembelian,
            'nama' => $nama,
            'tanggaltransfer' => $tanggaltransfer,
            'tanggal' => $tanggal,
            'bukti' => $namafix,
            'ktp' => $nama1,
            'kk' => $nama2,
            'suratnikah' => $nama3,
            'npwp' => $nama4,
            'bpjs' => $nama5,
            'sk' => $nama6,
            'gaji' => $nama7,
            'rekening' => $nama8,
            'type' => $type,
        ];

        // Insert data into the 'pembayaran' table
        DB::table('pembayaran')->insert($data);

        // Update the status in the 'pembelian' table
        DB::table('pembelian')->where('idpembelian', $idpembelian)->update([
            'statusbeli' => 'Sudah Upload Bukti Pembayaran',
        ]);

        // Flash a success message to the session
        Session()->flash('alert', 'Terima kasih, pembayaran anda berhasil. Mohon tunggu konfirmasi dari admin 🙏');

        // Redirect to the home/riwayat page
        return redirect('home/riwayat');
    }

    public function selesai(Request $request)
    {
        $idpembelian = $request->input('idpembelian');

        DB::table('pembelian')->where('idpembelian', $idpembelian)->update([
            'statusbeli' => 'Selesai'
        ]);

        return redirect('home/riwayat');
    }
}
