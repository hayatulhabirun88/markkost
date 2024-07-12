<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Booking;
use App\Models\Datakost;
use App\Models\Rekening;
use App\Models\Transaksi;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingMobileController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return redirect('mobile/login');
            }
            return $next($request);
        });
    }
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

        $request->validate([
            'datakost_id' => 'required',
            'nama_bank_tujuan' => 'required',
            'nominal' => 'required',
            'nama_pengirim' => 'required',
        ]);

        $nominal = preg_replace('/[^0-9.]/', '', $request->nominal);

        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->datakost_id = $request->datakost_id;
        $booking->status_booking = 'Dipesan';
        $booking->save();

        $transaksi = new Transaksi();
        $transaksi->booking_id = $booking->id;
        $transaksi->user_id = auth()->user()->id;
        $transaksi->rekening_id = $request->nama_bank_tujuan;
        $transaksi->tgl_kirim = date('Y-m-d');
        $transaksi->tgl_terima = date('Y-m-d');
        $transaksi->keterangan = "";
        $transaksi->total = $nominal;
        $transaksi->status_pembayaran = "Menunggu Pembayaran";
        $transaksi->save();

        $transfer = new Transfer();
        $transfer->nama_pengirim = $request->nama_pengirim;
        $transfer->tgl_transfer = date('Y-m-d H:i:s');
        $transfer->transaksi_id = $transaksi->id;
        $transfer->rekening_id = $request->nama_bank_tujuan;
        $transfer->save();

        return redirect()->to('/mobile/pembayaran/' . $transaksi->id)->with('success', 'Silahkan melakukan pembayaran!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datakost = Datakost::findOrFail($id);
        return view('mobile.booking.booking', compact(['datakost']));
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

    public function ajaxrekening(Request $request)
    {
        $rekening = Rekening::findOrFail($request->rekening_id);
        return response()->json([
            'message' => 'success',
            'data' => $rekening,
        ], 200);
    }
}
