@extends('web.template.content')

@section('title')
    Transaksi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9 d-flex align-items-center">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Transaksi</h4>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="/transaksi/cetak" class="btn btn-primary">Cetak</a>
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
                    <h5 class="card-header">Transaksi</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No Booking</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Pemilik</th>
                            <th>Tanggal Kirim</th>
                            <th>Tanggal Terima</th>
                            <th>Status Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($transaksi) > 0)
                            @foreach ($transaksi as $index => $trans)
                                <tr>
                                    <td>BK-{{ $trans->booking->id }}</td>
                                    <td>{{ $trans->booking->user->name }}</td>
                                    <td>{{ $trans->booking->datakost->user->name }}</td>
                                    <td>{{ $trans->tgl_kirim }}</td>
                                    <td>{{ $trans->tgl_terima }}</td>
                                    <td>{{ $trans->status_pembayaran }}</td>
                                    <td>{{ @$trans->keterangan }}</td>
                                    <td>{{ $trans->total }}</td>
                                    <td><a href="/transaksi/{{ $trans->id }}/edit" class="btn btn-sm btn-info"><i
                                                class='bx bx-list-ul'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="11">Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div><br><br>
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item {{ $transaksi->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $transaksi->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @foreach ($transaksi->getUrlRange(1, $transaksi->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $transaksi->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <li class="page-item {{ $transaksi->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $transaksi->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
