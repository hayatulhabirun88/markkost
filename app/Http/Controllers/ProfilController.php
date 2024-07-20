<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
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
        return view('web.profil.profil');
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
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255|unique:users,email,' . $id,
            'no_tlp' => 'string|max:15',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->no_tlp = $request->input('no_tlp');
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ajax_avatar(Request $request)
    {
        $request->validate([
            'upload' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $profil = Auth::user();

        if ($request->file('upload')) {
            @unlink(public_path() . '/images/profil/' . $profil->avatar);
            $namafile = md5($request->file('upload')->getClientOriginalName() . time()) . '.' . $request->file('upload')->getClientOriginalExtension();
            $request->file('upload')->move(public_path() . '/images/profil/', $namafile);
            $profil->avatar = $namafile;
        }

        $profil->update();

        return response()->json(['success' => 'Profil berhasil diubah', 'avatar' => $profil->avatar]);


    }
}
