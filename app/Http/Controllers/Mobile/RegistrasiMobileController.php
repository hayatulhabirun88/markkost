<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrasiMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mobile.registrasi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|lowercase|email|max:255|string|unique:users,email',
            'password' => 'required|min:8',
            'nama' => 'required|string',
            'no_tlp' => 'required',
            'level' => 'required',
            // 'dok_ktp' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($request->file('dok_ktp')) {
            $namafile = md5($request->file('dok_ktp')->getClientOriginalName() . time()) . '.' . $request->file('dok_ktp')->getClientOriginalExtension();
            $request->file('dok_ktp')->move(public_path() . '/images/', $namafile);
        } else {
            $namafile = "";
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->nama;
        $user->no_tlp = $request->no_tlp;
        $user->dok_ktp = $namafile;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('mobile.login')->with('success', 'Registrasi telah berhasil, silahkan login!');



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
}
