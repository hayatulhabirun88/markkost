@extends('web.template.content')

@section('title')
    Data Kost
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9 d-flex align-items-center">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Data Kost</h4>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="/data-kost/create" class="btn btn-primary">Tambah</a>
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
                    <h5 class="card-header">Data Kost</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Pemilik</th>
                            <th>Nama Kost</th>
                            <th>Fasilitas</th>
                            <th>Harian</th>
                            <th>Mingguan</th>
                            <th>Bulanan</th>
                            <th>Tahunan</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Maps</th>
                            <th>Ket</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($datakost) > 0)
                            @foreach ($datakost as $index => $dtkost)
                                <tr>
                                    <td>{{ $index + $datakost->firstItem() }}</td>
                                    <td><a href="/data-kost/{{ $dtkost->id }}/edit" class="btn btn-sm btn-warning"><i
                                                class='bx bxs-edit'></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteDatakost{{ $dtkost->id }}">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </td>
                                    <td>{{ @$dtkost->user->name }}</td>
                                    <td>{{ @$dtkost->nama_kost }}</td>
                                    <td>{{ @$dtkost->fasilitas }}</td>
                                    <td>{{ @$dtkost->harga_harian }}</td>
                                    <td>{{ @$dtkost->harga_mingguan }}</td>
                                    <td>{{ @$dtkost->harga_bulanan }}</td>
                                    <td>{{ @$dtkost->harga_tahunan }}</td>
                                    <td>{{ @$dtkost->no_telp }}</td>
                                    <td>{{ @$dtkost->alamat }}</td>
                                    <td><img width="50px"
                                            src="{{ asset('/') }}{{ env('ASSET_UPLOAD') }}gambarkost/{{ $dtkost->gambar }}"
                                            alt=""></td>
                                    <td>{{ $dtkost->maps }} </td>
                                    <td>{{ $dtkost->keterangan }}</td>
                                </tr>
                                <div class="modal fade" id="dokktpModal{{ $dtkost->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">KTP {{ $dtkost->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($dtkost->dok_ktp)
                                                    <img width="100%"
                                                        src="{{ asset('/') }}images/{{ $dtkost->dok_ktp }}"
                                                        alt="">
                                                @else
                                                    <h4>KTP Belum di upload</h4>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- delete --}}

                                <div class="modal fade" id="deleteDatakost{{ $dtkost->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Hapus
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <br>
                                                <div class="text-center">Apakah anda yakin <br> akan menghapus data <br> an.
                                                    {{ $dtkost->nama_kost }} ?</div>
                                                <form action="{{ route('datakost.destroy', $dtkost->id) }}" method="post"
                                                    style="display: inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger">Hapus</button>
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
                                <td colspan="11">Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div><br><br>
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item {{ $datakost->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $datakost->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @foreach ($datakost->getUrlRange(1, $datakost->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $datakost->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <li class="page-item {{ $datakost->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $datakost->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
