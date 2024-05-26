<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::orderBy('id', 'desc')->paginate(10);
        return view('web.booking.booking', compact(['booking']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * KONFIRMASI
     */
    public function konfirmasi(string $id)
    {
        Booking::findOrFail($id)->update([
            'status_booking' => "Konfirmasi"
        ]);

        return redirect()->route('booking')->with('success', 'Status Booking telah di konfirmasi');
    }
    /**
     * BATAL
     */
    public function batal(string $id)
    {
        Booking::findOrFail($id)->update([
            'status_booking' => "Batal"
        ]);

        return redirect()->route('booking')->with('success', 'Status Booking telah di batalkan');
    }
}
