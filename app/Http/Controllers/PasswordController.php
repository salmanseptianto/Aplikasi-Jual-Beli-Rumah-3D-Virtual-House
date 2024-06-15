<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Properti;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;


class PasswordController extends Controller
{

    public function index()
    {
        return view('auth.remember');
    }

    public function ubahsandi($token)
    {
        $pengguna = DB::table('pengguna')->where('token', $token)->first();

        if (!$pengguna) {
            abort(404);
        }

        return view('auth.Cpassword', ['token' => $token]);
    }

    public function update(Request $request)
    {
        $requiredFields = ['email', 'password', 'password_confirmation', 'token'];
        foreach ($requiredFields as $field) {
            if (empty($request->$field)) {
                $fieldNames = [
                    'email' => 'Email',
                    'password' => 'Password',
                    'password_confirmation' => 'Konfirmasi Password',
                    'token' => 'Token',
                ];
                $alertMessages = [
                    'email' => 'harus berupa alamat email yang valid.',
                    'password' => 'tidak boleh kosong dan minimal 6 karakter.',
                    'password_confirmation' => 'tidak boleh kosong.',
                    'token' => 'tidak boleh kosong.'
                ];
    
                $alertMessage = isset($alertMessages[$field]) ? $fieldNames[$field] . ' ' . $alertMessages[$field] : 'tidak boleh kosong.';
    
                return redirect()->back()->with('alert', $fieldNames[$field] . ' ' . $alertMessage);
            }
        }
    
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('alert', 'Password dan konfirmasi password tidak cocok.');
        }
    
        if (strlen($request->password) < 6) {
            return redirect()->back()->with('alert', 'Password harus terdiri dari minimal 6 karakter.');
        }
    
        $pengguna = DB::table('pengguna')
            ->where('token', $request->token)
            ->first();
    
        if (!$pengguna) {
            return redirect()->back()->with('alert', 'Token tidak ditemukan atau sudah tidak valid.');
        }
    
        if ($pengguna->email !== $request->email) {
            return redirect()->back()->with('alert', 'Email tidak sesuai dengan Email yang kamu miliki.');
        }
    
        DB::table('pengguna')->where('email', $request->email)->update([
            'password' => $request->password,
            'token' => null,
        ]);
    
        session()->flash('success', 'Password berhasil diperbarui. Silakan masuk dengan password baru Anda.');
        return redirect()->route('login');
    }
    

    public function verify(Request $request)
    {
        $email = $request->input('email');
        $akun = DB::table('pengguna')->where('email', $email)->first();

        if ($akun) {
            $token = Str::random(60);

            DB::table('pengguna')->where('email', $email)->update([
                'token' => $token,
            ]);

            Mail::to($email)->send(new Email($token));
            return redirect()->back()->with('alert', 'Link Untuk Mereset Password Sudah Dikirimkan Ke Email Anda 😊');
        } else {
            return redirect()->back()->with('alert', 'Maaf Email Tidak Dapat Ditemukan 🙏');
        }
    }
}
