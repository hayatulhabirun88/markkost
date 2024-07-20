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
                            <img src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}images/profil/{{ auth()->user()->avatar }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar"><br><br>


                            <form id="uploadForm" enctype="multipart/form-data">
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Ganti Foto</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" name="upload" class="account-file-input"
                                            hidden="" accept="image/png, image/jpeg">

                                    </label>
                                    <div id="status"></div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profil.update', auth()->user()->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                    <input type="text" class="form-control" value="{{ auth()->user()->level }}" readonly>
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

@push('script')
    <script>
        $(document).ready(function() {
            $('#uploadForm').on('change', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: `{{ route('ajax.upload.profil') }}`, // Gunakan route Laravel
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#uploadedAvatar').attr('src',
                                `{{ env('ASSET_UPLOAD') }}/images/profil/` + response.avatar)
                            .show();
                    },
                    error: function(xhr) {
                        $('#status').html('<p>Terjadi kesalahan saat upload foto.</p>');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
