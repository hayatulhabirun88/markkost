@extends('web.template.content')

@section('title')
    Tambah Data Kost
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
            const map = L.map('map').setView([-5.459671200227749, 122.599735404496], 13);


            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            const popup = L.popup()
                .setLatLng([-5.459671200227749, 122.599735404496])
                .setContent('Silahkan klik peta untuk menambahkan titik koordinat')
                .openOn(map);

            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent(`Anda menambahkan titik Koordinat ${e.latlng.toString()}`)
                    .openOn(map);
                $("#maps").val(e.latlng.toString().split('(')[1].split(')')[0]);
            }

            map.on('click', onMapClick);

        });
    </script>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Kost /</span> Tambah</h4>
        <div class="card">
            <h5 class="card-header">Tambah Data Kost</h5>
            <div class="card-body">
                <form action="{{ route('datakost.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                <select class="form-select form-select" name="user_id" id="nama_pemilik">
                                    <option value="">-- Pilih Nama Pemilik --</option>
                                    @foreach ($nama_pemilik as $nmpemilik)
                                        <option value="{{ $nmpemilik->id }}"
                                            {{ $nmpemilik->id == old('user_id') ? 'selected' : '' }}>
                                            {{ $nmpemilik->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_kost" class="form-label">Nama Kost</label>
                                <input type="text" class="form-control" value="{{ old('nama_kost') }}" name="nama_kost"
                                    id="nama_kost" placeholder="Nama Kost" />
                                @error('nama_kost')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telp</label>
                                <input type="text" value="{{ old('no_telp') }}" class="form-control" name="no_telp"
                                    id="no_telp" placeholder="No Telp" />
                                @error('no_telp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_harian" class="form-label">Harga Harian</label>
                                <input type="text" class="form-control" name="harga_harian" id="harga_harian"
                                    placeholder="Harga Harian" />
                                @error('harga_harian')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_mingguan" class="form-label">Harga Mingguan</label>
                                <input type="text" class="form-control" name="harga_mingguan" id="harga_mingguan"
                                    placeholder="Harga Mingguan" />
                                @error('harga_mingguan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="video" class="form-label">Video</label>
                                <input type="text" class="form-control" value="{{ old('video') }}" name="video"
                                    id="video" placeholder="Contoh: https://www.youtube.com/watch?v=ldVdNgkE2Yo" />
                                @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fasilitas" class="form-label">Fasilitas</label>
                                <textarea class="form-control" name="fasilitas" value="{{ old('fasilitas') }}" id="fasilitas" rows="3"></textarea>
                                @error('fasilitas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" value="{{ old('gambar') }}" name="gambar"
                                    id="gambar" placeholder="Gambar" />
                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar_detail" class="form-label">Gambar Detail</label>
                                <input type="file" class="form-control" value="{{ old('gambar_detail') }}"
                                    name="gambar_detail[]" id="gambar_detail[]" placeholder="Gambar Detail" multiple />
                                @error('gambar_detail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="maps" class="form-label">Titik Koordinat <span class="badge bg-danger">
                                        *klik
                                        pada peta
                                        dibawah</span></label>
                                <input type="text" class="form-control" value="{{ old('maps') }}" name="maps"
                                    id="maps" placeholder="Titik Koordinat : -5.495970042412335, 122.56891822158305"
                                    readonly />
                                @error('maps')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_bulanan" class="form-label">Harga Bulanan</label>
                                <input type="text" class="form-control" name="harga_bulanan" id="harga_bulanan"
                                    placeholder="Harga Bulanan" />
                                @error('harga_bulanan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="harga_tahunan" class="form-label">Harga Tahunan</label>
                                <input type="text" class="form-control" name="harga_tahunan" id="harga_tahunan"
                                    placeholder="Harga Tahunan" />
                                @error('harga_tahunan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" value="{{ old('keterangan') }}" id="keterangan" rows="3"></textarea>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="map" style="height: 300px;"></div>
                        <div class="m-3">
                            <input type="submit" class="btn btn-primary" value="Tambah">
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
