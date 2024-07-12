@extends('web.template.content')

@section('title')
    Profil
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Profil</h4>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Lengkap</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('/') }}backend/assets/img/avatars/1.png" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input class="form-control" type="text"
                                        value="{{ old('name', auth()->user()->name) }}" id="name" name="name"
                                        value="John" autofocus="">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        placeholder="john.doe@example.com">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="no_tlp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp"
                                        value="{{ old('no_tlp', auth()->user()->no_tlp) }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="level" class="form-label">Level</label>
                                    <select class="form-select form-select" name="level" id="level">
                                        <option selected>Pilih Level</option>
                                        <option value="pemilik_kost"
                                            {{ old('level', auth()->user()->level) == 'pemilik_kost' ? 'selected' : '' }}>
                                            Pemilik Kost</option>
                                        <option value="penyewa"
                                            {{ old('level', auth()->user()->level) == 'penyewa' ? 'selected' : '' }}>Penyewa
                                        <option value="admin"
                                            {{ old('level', auth()->user()->level) == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Simpan Profil</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@endsection
