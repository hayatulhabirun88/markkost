<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session::get('user_id') !== null) {
            return redirect('/mobile/otp-login');
        }
        if (auth()->user()) {
            return redirect('/mobile/dashboard/');
        } else {
            return view('mobile.auth.login');
        }
    }

    /**
     * PROSES LOGIN DI MOBILE.
     */
    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email anda tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        // Autentikasi pengguna
        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            $request->session()->put('user_id', $user->id);

            // Pastikan level user bukan admin
            if ($user->level != "admin") {
                // Generate OTP acak 6 digit
                $otpCode = rand(100000, 999999);

                // Simpan OTP di database user
                $user->otp = $otpCode;
                $user->save();

                // Kirim OTP ke email user
                // Mail::send('emails.otp', ['otp' => $otpCode], function ($message) use ($user) {
                //     $message->to($user->email);
                //     $message->subject('Kode OTP Anda');
                // });

                // Logout user sementara sampai OTP diverifikasi
                Auth::logout();

                // Redirect ke halaman OTP
                return redirect()->route('proses.login.otp')->with('message', 'Silakan masukkan kode OTP yang telah dikirim ke email Anda.');
            }

            // Jika level adalah admin, langsung regenerasi session dan redirect ke dashboard
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/mobile/dashboard');
    }

    public function otp_login()
    {
        if (Session::get('user_id') === null) {
            return redirect('/mobile/login');
        }
        return view('mobile.auth.otp');
    }

    public function proses_otp_login(Request $request)
    {
        $request->validate([
            'otpcode' => 'required|digits:6', // Validasi panjang kode OTP
        ], [
            'otpcode.required' => 'Kode OTP harus diisi',
            'otpcode.digits' => 'Kode OTP harus terdiri dari 6 digit'
        ]);

        $user = User::where('otp', $request->otpcode)->first();

        // Periksa apakah kode OTP yang dimasukkan benar
        if ($user) {
            Auth::login($user);
            // Hapus OTP setelah berhasil diverifikasi
            auth()->user()->otp = null;
            auth()->user()->save();

            // Regenerasi session setelah login sukses
            $request->session()->regenerate();

            // Redirect ke dashboard
            return redirect()->intended('mobile/dashboard');
        } else {
            // Jika OTP tidak cocok
            return redirect()->to('/mobile/otp-login')->withErrors([
                'otpcode' => 'Kode OTP tidak cocok!'
            ]);
        }

        // Jika OTP tidak cocok
        return back()->withErrors([
            'otpcode' => 'Kode OTP yang Anda masukkan salah!'
        ]);


    }
}
