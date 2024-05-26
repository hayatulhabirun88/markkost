@extends('web.template.content')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="text-center m-3">
                                        <i style="font-size: 60px; color:#71dd37;" class='bx bxs-user-detail'></i>
                                    </div>
                                </div>
                                <span style="font-size: 20px;"
                                    class="fw-semibold d-block mb-1">{{ App\Models\User::whereIn('level', ['pemilik_kost', 'penyewa'])->count() }}
                                    Pengguna</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="text-center m-3">
                                        <i style="font-size: 60px; color:#696cff" class='bx bx-home'></i>
                                    </div>
                                </div>
                                <span style="font-size: 20px;"
                                    class="fw-semibold d-block mb-1">{{ App\Models\Datakost::count() }} Kost</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="text-center m-3">
                                        <i style="font-size: 60px; color:#fd7e14" class='bx bx-key'></i>
                                    </div>
                                </div>
                                <span style="font-size: 20px;"
                                    class="fw-semibold d-block mb-1">{{ App\Models\Booking::count() }} Booking</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="text-center m-3">
                                        <i style="font-size: 60px;color:#03c3ec" class='bx bx-transfer'></i>
                                    </div>
                                </div>
                                <span style="font-size: 20px;"
                                    class="fw-semibold d-block mb-1">{{ App\Models\Transaksi::count() }} Transaksi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
