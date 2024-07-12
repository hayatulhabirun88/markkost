<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Booking;
use App\Models\Transfer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranMobileController extends Controller
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
        $transaksi = Transaksi::findOrFail($id);
        return view('mobile.pembayaran.pembayaran', compact(['transaksi']));
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

    public function konfirmasi(Request $request, $id)
    {

        $transaksi = Transaksi::findOrFail($id);


        $request->validate([
            'tgl_transfer' => 'required',
            'bukti_transfer' => 'required|image|mimes:pdf,jpg,png,jpeg,gif',
        ]);

        $transfer = Transfer::where('transaksi_id', $id)->first();

        if ($request->file('bukti_transfer')) {
            $namafile = md5($request->file('bukti_transfer')->getClientOriginalName() . time()) . '.' . $request->file('bukti_transfer')->getClientOriginalExtension();
            $request->file('bukti_transfer')->move(public_path() . '/bukti_transfer/', $namafile);
            $transfer->bukti_transfer = $namafile;
        } else {
            $namafile = "";
        }
        $transfer->save();

        $transaksi->status_pembayaran = 'Bukti Dikirim';
        $transaksi->tgl_kirim = $request->tgl_transfer;
        $transaksi->save();

        $booking = Booking::findOrFail($transaksi->booking_id);
        $booking->status_booking = 'Dibayar';
        $booking->save();

        return redirect()->to('/mobile/konfirmasi_pembayaran')->with('success', 'Data bukti pembayaran berhasil di kirim');

    }

    public function pesan_konfirmasi()
    {
        return view('mobile.pembayaran.pesan_konfirmasi');
    }
}
