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
        if ($request->input('cari_kost')) {
            $datakost = Datakost::where('nama_kost', 'like', '%' . $request->input('cari_kost') . '%')->paginate(10);
        } else {
            $datakost = Datakost::paginate(10);
        }
        return view('mobile.home.cari', compact(['datakost']));
    }

}
