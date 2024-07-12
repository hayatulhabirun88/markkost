<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('level', 'pemilik_kost')->get();
        $rekening = Rekening::orderBy('id', 'desc')->paginate(10);
        return view('web.rekening.rekening', compact(['user', 'rekening']));
    }

    public function create()
    {
        $user = User::where('level', 'pemilik_kost')->get();
        return view('web.rekening.create', compact(['user']));
    }

    public function edit(string $id)
    {

        $rekening = Rekening::findOrFail($id);
        $user = User::where('level', 'pemilik_kost')->get();
        return view('web.rekening.edit', compact(['rekening', 'user']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rekening' => 'required',
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'pengguna' => 'required',
        ]);

        $rekening = new Rekening();

        $rekening->nama_rekening = $request->nama_rekening;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->nama_bank = $request->nama_bank;
        $rekening->user_id = $request->pengguna;
        $rekening->save();

        return redirect()->to('/rekening')->with('success', 'Rekening berhasil di simpan');
    }

    public function update(Request $request, string $id)
    {
        $rekening = Rekening::findOrFail($id);

        $request->validate([
            'nama_rekening' => 'required',
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'pengguna' => 'required',
        ]);

        $rekening->nama_rekening = $request->nama_rekening;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->nama_bank = $request->nama_bank;
        $rekening->user_id = $request->pengguna;
        $rekening->save();

        return redirect()->to('/rekening')->with('success', 'Rekening berhasil di simpan');
    }

    public function destroy(string $id)
    {
        $rekening = Rekening::findOrFail($id);

        $rekening->delete();

        return redirect()->to('/rekening')->with('success', 'Data berhasil di hapus');
    }
}
