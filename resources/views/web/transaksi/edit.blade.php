@extends('web.template.content')

@section('title')
    Detail Transaksi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Detail</h4>
        <div class="card">
            <h5 class="card-header">Detail Transaksi</h5>
            <div class="card-body">
                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->booking->user->name) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kost</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->booking->datakost->nama_kost) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Fasilitas</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->booking->datakost->fasilitas) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->booking->datakost->keterangan) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->booking->datakost->harga) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tanggal Kirim</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->tgl_kirim) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tanggal Terima</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', @$transaksi->tgl_terima) }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran"
                                    value="{{ old('name', @$transaksi->status_pembayaran) }}"
                                    placeholder="Status Pembayaran" aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Nama Pengirim</label>
                                <input type="text" class="form-control" id="status_pembayaran" name="status_pembayaran"
                                    value="{{ old('name', \App\Models\Transfer::where('transaksi_id', $transaksi->id)->first()->nama_pengirim) }}"
                                    placeholder="Status Pembayaran" aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Nama Rekening Tujuan</label>
                                <input type="text" class="form-control" id="status_pembayaran"
                                    name="status_pembayaran"
                                    value="{{ old('name', @$transaksi->rekening->nama_rekening) }}"
                                    placeholder="Status Pembayaran" aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Nomor Rekening Tujuan</label>
                                <input type="text" class="form-control" id="status_pembayaran"
                                    name="status_pembayaran"
                                    value="{{ old('name', @$transaksi->rekening->nomor_rekening) }}"
                                    placeholder="Status Pembayaran" aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Nama Bank </label>
                                <input type="text" class="form-control" id="status_pembayaran"
                                    name="status_pembayaran" value="{{ old('name', @$transaksi->rekening->nama_bank) }}"
                                    placeholder="Status Pembayaran" aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Tanggal Transfer </label>
                                <input type="text" class="form-control" id="status_pembayaran"
                                    name="status_pembayaran"
                                    value="{{ old('name', \App\Models\Transfer::where('transaksi_id', $transaksi->id)->first()->tgl_transfer) }}"
                                    placeholder="Status Pembayaran" aria-describedby="defaultFormControlHelp" disabled>
                            </div>
                            <label for="">Bukti Transfer</label><br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#lihatBuktiModal">
                                Lihat Bukti
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="lihatBuktiModal" tabindex="-1"
                                aria-labelledby="lihatBuktiModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="lihatBuktiModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img width="100%"
                                                src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}bukti_transfer/{{ \App\Models\Transfer::where('transaksi_id', $transaksi->id)->first()->bukti_transfer }}"
                                                alt="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
