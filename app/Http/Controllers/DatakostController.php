<?php

namespace App\Http\Controllers;

use App\Models\GambarDetailKost;
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
            "harga_harian" => "required|numeric",
            "harga_mingguan" => "required|numeric",
            "harga_bulanan" => "required|numeric",
            "harga_tahunan" => "required|numeric",
            "fasilitas" => "required",
            "maps" => "required",
            "alamat" => "required",
            "keterangan" => "required",
            "gambar" => "required|image|mimes:gif,png,jpg,jpeg",
            "gambar_detail.*" => "required|image|mimes:gif,png,jpg,jpeg",
            "video" => "required|string",
        ], [
            "user_id.required" => "ID pengguna harus diisi.",
            "user_id.numeric" => "ID pengguna harus berupa angka.",
            "nama_pemilik.required" => "Nama pemilik harus diisi.",
            "nama_kost.required" => "Nama kost harus diisi.",
            "no_telp.required" => "Nomor telepon harus diisi.",
            "harga_harian.required" => "Harga harian harus diisi.",
            "harga_harian.numeric" => "Harga harian harus berupa angka.",
            "harga_mingguan.required" => "Harga mingguan harus diisi.",
            "harga_mingguan.numeric" => "Harga mingguan harus berupa angka.",
            "harga_bulanan.required" => "Harga bulanan harus diisi.",
            "harga_bulanan.numeric" => "Harga bulanan harus berupa angka.",
            "harga_tahunan.required" => "Harga tahunan harus diisi.",
            "harga_tahunan.numeric" => "Harga tahunan harus berupa angka.",
            "fasilitas.required" => "Fasilitas harus diisi.",
            "maps.required" => "Maps harus diisi.",
            "alamat.required" => "Alamat harus diisi.",
            "keterangan.required" => "Keterangan harus diisi.",
            "gambar.required" => "Gambar harus diunggah.",
            "gambar.image" => "File yang diunggah harus berupa gambar.",
            "gambar.mimes" => "Gambar harus dalam format: gif, png, jpg, jpeg.",
            "gambar_detail.*.required" => "Gambar detail harus diunggah.",
            "gambar_detail.*.image" => "File gambar detail harus berupa gambar.",
            "gambar_detail.*.mimes" => "Gambar detail harus dalam format: gif, png, jpg, jpeg.",
            "video.required" => "Video harus diisi.",
            "video.string" => "Video harus berupa string.",
        ]);

        if ($request->file('gambar')) {
            $namafile = md5($request->file('gambar')->getClientOriginalName() . time()) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path() . '/gambarkost/', $namafile);
        } else {
            $namafile = "";
        }



        $datakost = Datakost::create([
            "user_id" => $request->user_id,
            "nama_kost" => $request->nama_kost,
            "no_telp" => $request->no_telp,
            "harga_harian" => $request->harga_harian,
            "harga_mingguan" => $request->harga_mingguan,
            "harga_bulanan" => $request->harga_bulanan,
            "harga_tahunan" => $request->harga_tahunan,
            "fasilitas" => $request->fasilitas,
            "maps" => $request->maps,
            "alamat" => $request->alamat,
            "keterangan" => $request->keterangan,
            "gambar" => $namafile,
            "video" => $request->video,
        ]);

        if ($request->hasFile('gambar_detail')) {
            foreach ($request->file('gambar_detail') as $gmbd) {
                $namafile = md5($gmbd->getClientOriginalName() . time()) . '.' . $gmbd->getClientOriginalExtension();
                $gmbd->move(public_path() . '/gambar_detail/', $namafile);
                GambarDetailKost::create([
                    'datakost_id' => $datakost->id,
                    'gambar' => $namafile
                ]);
            }
        }

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
        $gambar_detail = GambarDetailKost::where('datakost_id', $datakost->id)->get();
        return view('web.datakost.edit', compact(['nama_pemilik', 'datakost', 'gambar_detail']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datakost = Datakost::findOrFail($id);

        $request->validate([
            "nama_pemilik" => "required|numeric",
            "nama_kost" => "required",
            "no_telp" => "required",
            "harga_harian" => "required|numeric",
            "harga_mingguan" => "required|numeric",
            "harga_bulanan" => "required|numeric",
            "harga_tahunan" => "required|numeric",
            "fasilitas" => "required",
            "maps" => "required",
            "alamat" => "required",
            "keterangan" => "required",
            "gambar" => "image|mimes:gif,png,jpg,jpeg",
            "gambar_detail.*" => "image|mimes:gif,png,jpg,jpeg",
        ], [
            "nama_pemilik.required" => "Nama pemilik harus diisi.",
            "nama_pemilik.numeric" => "Nama pemilik harus berupa angka.",
            "nama_kost.required" => "Nama kost harus diisi.",
            "no_telp.required" => "Nomor telepon harus diisi.",
            "harga_harian.required" => "Harga harian harus diisi.",
            "harga_harian.numeric" => "Harga harian harus berupa angka.",
            "harga_mingguan.required" => "Harga mingguan harus diisi.",
            "harga_mingguan.numeric" => "Harga mingguan harus berupa angka.",
            "harga_bulanan.required" => "Harga bulanan harus diisi.",
            "harga_bulanan.numeric" => "Harga bulanan harus berupa angka.",
            "harga_tahunan.required" => "Harga tahunan harus diisi.",
            "harga_tahunan.numeric" => "Harga tahunan harus berupa angka.",
            "fasilitas.required" => "Fasilitas harus diisi.",
            "maps.required" => "Maps harus diisi.",
            "alamat.required" => "Alamat harus diisi.",
            "keterangan.required" => "Keterangan harus diisi.",
            "gambar.image" => "File yang diunggah harus berupa gambar.",
            "gambar.mimes" => "Gambar harus dalam format: gif, png, jpg, jpeg.",
            "gambar_detail.*.image" => "File gambar detail harus berupa gambar.",
            "gambar_detail.*.mimes" => "Gambar detail harus dalam format: gif, png, jpg, jpeg.",
        ]);

        if ($request->file('gambar')) {
            @unlink(public_path('/images/' . $datakost->gambar));

            $namafile = md5($request->file('gambar')->getClientOriginalName() . time()) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path() . '/gambarkost/', $namafile);
            $datakost->gambar = $namafile;
        }

        // Hapus foto lama jika ada file baru yang diunggah
        if ($request->file('gambar_detail')) {

            $oldPhotos = GambarDetailKost::where('datakost_id', $datakost->id)->get();

            foreach ($oldPhotos as $oldPhoto) {
                @unlink(public_path('gambar_detail/' . $oldPhoto->gambar));
                $oldPhoto->delete();
            }

            // Upload dan simpan gambar_detail baru
            foreach ($request->file('gambar_detail') as $gmbrd) {
                $namafile = md5($gmbrd->getClientOriginalName() . time()) . '.' . $gmbrd->getClientOriginalExtension();
                $gmbrd->move(public_path('/gambar_detail/'), $namafile);
                GambarDetailKost::create([
                    'gambar' => $namafile,
                    'datakost_id' => $datakost->id
                ]);
            }
        }
        $datakost->user_id = $request->nama_pemilik;
        $datakost->nama_kost = $request->nama_kost;
        $datakost->no_telp = $request->no_telp;
        $datakost->harga_harian = $request->harga_harian;
        $datakost->harga_mingguan = $request->harga_mingguan;
        $datakost->harga_bulanan = $request->harga_bulanan;
        $datakost->harga_tahunan = $request->harga_tahunan;
        $datakost->fasilitas = $request->fasilitas;
        $datakost->maps = $request->maps;
        $datakost->alamat = $request->alamat;
        $datakost->keterangan = $request->keterangan;
        $datakost->video = $request->video;
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
