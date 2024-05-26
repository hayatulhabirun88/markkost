<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Datakost;
use Illuminate\Http\Request;

class DatakostController extends Controller
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
        $datakost = Datakost::orderBy('id', 'DESC')->paginate(10);
        return view('web.datakost.datakost', compact(['datakost']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nama_pemilik = User::where('level', 'pemilik_kost')->get();
        return view('web.datakost.create', compact(['nama_pemilik']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "user_id" => "required|numeric",
            "nama_kost" => "required",
            "no_telp" => "required",
            "harga" => "required|numeric",
            "fasilitas" => "required",
            "maps" => "required",
            "alamat" => "required",
            "keterangan" => "required",
            "gambar" => "required|image|mimes:gif,png,jpg,jpeg",
        ]);

        if ($request->file('gambar')) {
            $namafile = md5($request->file('gambar')->getClientOriginalName() . time()) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path() . '/gambarkost/', $namafile);
        } else {
            $namafile = "";
        }

        Datakost::create([
            "user_id" => $request->user_id,
            "nama_kost" => $request->nama_kost,
            "no_telp" => $request->no_telp,
            "harga" => $request->harga,
            "fasilitas" => $request->fasilitas,
            "maps" => $request->maps,
            "alamat" => $request->alamat,
            "keterangan" => $request->keterangan,
            "gambar" => $namafile,
        ]);

        return redirect()->route('datakost')->with('success', 'Data berhasil di tambah');
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
        $nama_pemilik = User::where('level', 'pemilik_kost')->get();
        $datakost = Datakost::findOrFail($id);
        return view('web.datakost.edit', compact(['nama_pemilik', 'datakost']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datakost = Datakost::findOrFail($id);

        $request->validate([
            "user_id" => "required|numeric",
            "nama_kost" => "required",
            "no_telp" => "required",
            "harga" => "required|numeric",
            "fasilitas" => "required",
            "maps" => "required",
            "alamat" => "required",
            "keterangan" => "required",
            "gambar" => "image|mimes:gif,png,jpg,jpeg",
        ]);

        if ($request->file('gambar')) {
            @unlink(public_path('/images/' . $datakost->gambar));

            $namafile = md5($request->file('gambar')->getClientOriginalName() . time()) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path() . '/gambarkost/', $namafile);
            $datakost->gambar = $namafile;
        }

        $datakost->nama_kost = $request->nama_kost;
        $datakost->no_telp = $request->no_telp;
        $datakost->harga = $request->harga;
        $datakost->fasilitas = $request->fasilitas;
        $datakost->maps = $request->maps;
        $datakost->alamat = $request->alamat;
        $datakost->keterangan = $request->keterangan;
        $datakost->save();

        return redirect()->route('datakost')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datakost = Datakost::findOrFail($id);

        @unlink(public_path('/gambarkost/' . $datakost->gambar));
        $datakost->delete();

        return redirect()->route('datakost')->with('success', 'Data berhasil di hapus');
    }
}
