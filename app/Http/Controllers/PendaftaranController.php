<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftaran = User::whereIn('level', ['pemilik_kost', 'penyewa'])->orderBy('id', 'DESC')->paginate(10);
        return view('web.pendaftaran.pendaftaran', compact(['pendaftaran']));
    }

    /**
     * Display a listing of the resource.
     */
    public function search($level)
    {
        $pendaftaran = User::where('level', $level)->orderBy('id', 'DESC')->paginate(10);
        return view('web.pendaftaran.pendaftaran', compact(['pendaftaran']));
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
        $pendaftaran = User::findOrFail($id);
        return view('web.pendaftaran.edit', compact(['pendaftaran']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|lowercase|email|max:255|string|unique:users,email,' . $user->id,
            'no_tlp' => 'required|max:255',
            'level' => 'required',
            'dok_ktp' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($request->file('dok_ktp')) {
            @unlink(public_path('/images/' . $user->dok_ktp));

            $namafile = md5($request->file('dok_ktp')->getClientOriginalName() . time()) . '.' . $request->file('dok_ktp')->getClientOriginalExtension();
            $request->file('dok_ktp')->move(public_path() . '/images/', $namafile);
            $user->dok_ktp = $namafile;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_tlp = $request->no_tlp;
        $user->level = $request->level;
        $user->save();

        return redirect()->to('pendaftaran')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        @unlink(public_path('/images/' . $user->dok_ktp));
        $user->delete();

        return redirect()->to('pendaftaran')->with('success', 'Data berhasil di hapus');
    }
}
