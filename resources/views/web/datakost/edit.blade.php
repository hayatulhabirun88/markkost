@extends('web.template.content')

@section('title')
    Edit Data Kost
@endsection

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            const map = L.map('map').setView([{{ $datakost->maps }}], 13);


            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://markkost.my.id">Mark Kost</a>'
            }).addTo(map);

            const popup = L.popup()
                .setLatLng([{{ $datakost->maps }}])
                .setContent('Titik anda berada disini, untuk mengubah klik pada peta')
                .openOn(map);

            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent(`Anda mengubah titik Koordinat ${e.latlng.toString()}`)
                    .openOn(map);
                $("#maps").val(e.latlng.toString().split('(')[1].split(')')[0]);
            }

            map.on('click', onMapClick);

        });
    </script>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Kost /</span> Edit</h4>
        <div class="card">
            <h5 class="card-header">Edit Data Kost</h5>
            <div class="card-body">
                <form action="{{ route('datakost.update', $datakost->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                <select class="form-select form-select" name="nama_pemilik" id="nama_pemilik">
                                    <option value="" selected>-- Pilih Nama Pemilik --</option>
                                    @foreach ($nama_pemilik as $nmpemilik)
                                        <option value="{{ $nmpemilik->id }}"
                                            {{ $nmpemilik->id == old('nama_pemilik', $datakost->user_id) ? 'selected' : '' }}>
                                            {{ $nmpemilik->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kost" class="form-label">Nama Kost</label>
                                <input type="text" class="form-control"
                                    value="{{ old('nama_kost', $datakost->nama_kost) }}" name="nama_kost" id="nama_kost"
                                    placeholder="Nama Kost" />
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telp</label>
                                <input type="text" value="{{ old('no_telp', $datakost->no_telp) }}" class="form-control"
                                    name="no_telp" id="no_telp" placeholder="No Telp" />
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" value="{{ old('harga', $datakost->harga) }}"
                                    name="harga" id="harga" placeholder="Harga" />
                            </div>
                            <div class="mb-3">
                                <label for="video" class="form-label">Video</label>
                                <input type="text" class="form-control" value="{{ old('video', $datakost->video) }}"
                                    name="video" id="video" placeholder="Video" />
                            </div>

                            <div class="mb-3">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <textarea class="form-control" name="fasilitas" id="fasilitas" rows="3">{{ old('fasilitas', $datakost->fasilitas) }}</textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Utama</label>
                                        <input type="file" class="form-control"
                                            value="{{ old('gambar', $datakost->gambar) }}" name="gambar" id="gambar"
                                            placeholder="Gambar" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button type="button" style="margin-top:25px !important;" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#lihatGambarUtama">
                                            Lihat Gambar Utama
                                        </button>

                                        <div class="modal fade" id="lihatGambarUtama" tabindex="-1"
                                            aria-labelledby="lihatGambarUtamaLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="lihatGambarUtamaLabel">Gambar Utama</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img style="width:100%"
                                                            src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}gambarkost/{{ $datakost->gambar }}"
                                                            alt="" srcset="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gambar_detail" class="form-label">Gambar Detail</label>
                                        <input type="file" class="form-control"
                                            value="{{ old('gambar_detail', $datakost->gambar_detail) }}"
                                            name="gambar_detail[]" id="gambar_detail[]" placeholder="Gambar Detail"
                                            multiple />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" style="margin-top:25px !important;" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#lihatGambarDetail">
                                        Lihat Gambar Detail
                                    </button>

                                    <div class="modal fade" id="lihatGambarDetail" tabindex="-1"
                                        aria-labelledby="lihatGambarDetailLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="lihatGambarDetailLabel">Gambar Detail</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($gambar_detail as $gmbdtl)
                                                        <img style="width:200px;"
                                                            src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}gambar_detail/{{ $gmbdtl->gambar }}"
                                                            alt="" srcset="">
                                                    @endforeach

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="maps" class="form-label">Titik Koordinat <span class="badge bg-danger">
                                        *klik
                                        pada peta
                                        dibawah</span></label>
                                <input type="text" class="form-control" value="{{ old('maps', $datakost->maps) }}"
                                    name="maps" id="maps"
                                    placeholder="Titik Koordinat : -5.495970042412335, 122.56891822158305" readonly />
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat', $datakost->alamat) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3">{{ old('keterangan', $datakost->keterangan) }}</textarea>
                            </div>
                        </div>
                        <div id="map" style="height: 300px;"></div>
                        <div class="m-3">
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </div>
                    </div>
                </form>


            </div>
        </div>


    </div>

    <!-- Extra Large Modal -->
    <div class="modal fade" id="titikKoordinatModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameExLarge" class="form-label">Name</label>
                            <input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailExLarge" class="form-label">Email</label>
                            <input type="text" id="emailExLarge" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">DOB</label>
                            <input type="text" id="dobExLarge" class="form-control" placeholder="DD / MM / YY" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
