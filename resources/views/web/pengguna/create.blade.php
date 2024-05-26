@extends('web.template.content')

@section('title')
    Tambah Pengguna
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengguna /</span> Tambah</h4>
        <div class="card">
            <h5 class="card-header">Tambah Pengguna</h5>
            <div class="card-body">
                <form action="{{ route('store.pengguna') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Nama"
                                    aria-describedby="defaultFormControlHelp">
                                @error('name')
                                    <span style="color:red;font-size:13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Email"
                                    aria-describedby="defaultFormControlHelp">
                                @error('email')
                                    <span style="color:red;font-size:13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" aria-describedby="defaultFormControlHelp">
                                @error('password')
                                    <span style="color:red;font-size:13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">No Telp</label>
                                <input type="no_tlp" class="form-control" id="no_tlp" name="no_tlp"
                                    value="{{ old('no_tlp') }}" placeholder="No Telp"
                                    aria-describedby="defaultFormControlHelp">
                                @error('no_tlp')
                                    <span style="color:red;font-size:13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Keterangan</label>
                                <select class="form-select" id="level" name="level">
                                    <option value="">-- Pilih Keterangan --</option>
                                    <option value="pemilik_kost" {{ old('level') == 'pemilik_kost' ? 'selected' : '' }}>
                                        Pemilik</option>
                                    <option value="penyewa" {{ old('level') == 'penyewa' ? 'selected' : '' }}>Penyewa
                                    </option>
                                </select>
                                @error('level')
                                    <span style="color:red;font-size:13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dok_ktp">Dokumen KTP</label>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="dok_ktp" id="dok_ktp"
                                        placeholder="Dokumen KTP" aria-describedby="fileHelpId" />
                                </div>
                                @error('dok_ktp')
                                    <span style="color:red;font-size:13px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
