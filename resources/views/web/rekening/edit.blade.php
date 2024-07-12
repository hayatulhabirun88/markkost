@extends('web.template.content')

@section('title')
    Ubah Rekening
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rekening /</span> Ubah</h4>
        <div class="card">
            <h5 class="card-header">Ubah Rekening</h5>
            <div class="card-body">
                <form action="{{ route('rekening.update', $rekening->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_rekening" class="form-label">Nama Rekening</label>
                                <input type="text" class="form-control" id="nama_rekening" name="nama_rekening"
                                    value="{{ old('nama_rekening', $rekening->nama_rekening) }}" placeholder="Nama Rekening"
                                    aria-describedby="defaultFormControlHelp">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                                <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening"
                                    value="{{ old('nomor_rekening', $rekening->nomor_rekening) }}"
                                    placeholder="Nomor Rekening" aria-describedby="defaultFormControlHelp">
                            </div>
                            <div class="mb-3">
                                <label for="nama_bank" class="form-label">Nama Bank</label>
                                <input type="nama_bank" class="form-control" id="nama_bank" name="nama_bank"
                                    value="{{ old('nama_bank', $rekening->nama_bank) }}" placeholder="Nama Bank"
                                    aria-describedby="defaultFormControlHelp">
                            </div>
                            <div class="mb-3">
                                <label for="pengguna" class="form-label">Pemilik Kost</label>
                                <select class="form-select" id="pengguna" name="pengguna">
                                    <option>-- Pilih Keterangan --</option>
                                    @foreach ($user as $usr)
                                        <option value="{{ $usr->id }}"
                                            {{ old('pengguna', $usr->id) == $rekening->user_id ? 'selected' : '' }}>
                                            {{ $usr->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </div>
                    </div>
                </form>


            </div>
        </div>


    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#cari").change(function(e) {
                e.preventDefault();
                let cari = $("#cari").val();

                if (cari == "pemilik_kost") {
                    window.location.href = `{{ asset('/') }}rekening/pemilik_kost`;
                } else if (cari == "penyewa") {
                    window.location.href = `{{ asset('/') }}rekening/penyewa`;
                } else {
                    window.location.href = `{{ asset('/') }}rekening`;
                }
            });
        });
    </script>
@endpush
