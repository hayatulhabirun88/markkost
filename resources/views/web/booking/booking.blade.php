@extends('web.template.content')

@section('title')
    Booking Kost
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9 d-flex align-items-center">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Booking Kost</h4>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="card-header">Booking Kost</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Nama Pemesan</th>
                            <th>Nama Kost</th>
                            <th>Status Booking</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($booking) > 0)
                            @foreach ($booking as $index => $bk)
                                <tr>
                                    <td>BK-{{ $bk->id }}</td>

                                    <td>{{ @$bk->user->name }}</td>
                                    <td>{{ @$bk->datakost->nama_kost }}</td>
                                    <td>
                                        @if ($bk->status_booking == 'Dipesan')
                                            <span class="badge bg-secondary">{{ $bk->status_booking }}</span>
                                        @elseif ($bk->status_booking == 'Dibayar')
                                            <span class="badge bg-success">{{ $bk->status_booking }}</span>
                                        @elseif ($bk->status_booking == 'Konfirmasi')
                                            <span class="badge bg-primary">{{ $bk->status_booking }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $bk->status_booking }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi{{ $bk->id }}">
                                            Konfirmasi
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#batal{{ $bk->id }}">
                                            Batal
                                        </button>
                                    </td>
                                </tr>
                                {{-- KONFIRMASI --}}

                                <div class="modal fade" id="konfirmasi{{ $bk->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Konfirmasi
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <br>
                                                <div class="text-center">Apakah anda yakin <br> akan mengkonfirmasi booking
                                                    <br> an.
                                                    {{ $bk->user->name }} ?
                                                </div>
                                                <form action="{{ route('booking.konfirmasi', $bk->id) }}" method="post"
                                                    style="display: inline-block">
                                                    @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Konfirmasi</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="batal{{ $bk->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Hapus
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <br>
                                                <div class="text-center">Apakah anda yakin <br> akan membatalkan booking
                                                    <br> an.
                                                    {{ $bk->user->name }} ?
                                                </div>
                                                <form action="{{ route('booking.batal', $bk->id) }}" method="post"
                                                    style="display: inline-block">
                                                    @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger">Batal</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div><br><br>
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item {{ $booking->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $booking->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @foreach ($booking->getUrlRange(1, $booking->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $booking->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <li class="page-item {{ $booking->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $booking->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
