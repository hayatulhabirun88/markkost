<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Datakost;
use App\Models\GambarDetailKost;
use Illuminate\Http\Request;

class HomeMobileController extends Controller
{
    public function index()
    {
        $datakost = Datakost::paginate(5);
        return view('mobile.home.index', compact(['datakost']));
    }

    public function show(string $id)
    {
        $datakost = Datakost::findOrFail($id);
        return view('mobile.home.detail', compact(['datakost']));
    }

    public function cari(Request $request)
    {
        $datakost = Datakost::query();

        // Pencarian menggunakan input 'cari_kost' di nama_kost, alamat, dan harga
        if ($request->input('cari_kost')) {
            $cariKost = $request->input('cari_kost');

            $datakost->where(function ($query) use ($cariKost) {
                $query->where('nama_kost', 'like', '%' . $cariKost . '%')
                    ->orWhere('alamat', 'like', '%' . $cariKost . '%')
                    ->orWhere('harga_harian', 'like', '%' . $cariKost . '%')
                    ->orWhere('harga_mingguan', 'like', '%' . $cariKost . '%')
                    ->orWhere('harga_bulanan', 'like', '%' . $cariKost . '%')
                    ->orWhere('harga_tahunan', 'like', '%' . $cariKost . '%')
                    ->orWhere('fasilitas', 'like', '%' . $cariKost . '%');
            });
        }

        // Paginate hasil pencarian
        $datakost = $datakost->paginate(10);
        return view('mobile.home.cari', compact(['datakost']));
    }

}
