@extends('web.template.content')

@section('title')
    Pengguna
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Pengguna</h4>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="/pengguna/create" class="btn btn-primary">Tambah</a>
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
                    <h5 class="card-header">Pengguna</h5>
                </div>

            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Dokumentasi KTP</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($user) > 0)
                            @foreach ($user as $index => $usr)
                                <tr>
                                    <td>{{ $index + $user->firstItem() }}</td>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->no_tlp }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#dokktpModal{{ $usr->id }}">
                                            Lihat KTP
                                        </button>
                                    </td>
                                    <td>
                                        @if ($usr->level == 'pemilik_kost')
                                            <span class="badge bg-label-primary me-1">Pemilik</span>
                                        @elseif($usr->level == 'penyewa')
                                            <span class="badge bg-label-info me-1">Pengguna</span>
                                        @else
                                            <span class="badge bg-label-success">Admin</span>
                                        @endif
                                    </td>
                                    <td><a href="/pengguna/{{ $usr->id }}/edit" class="btn btn-sm btn-warning"><i
                                                class='bx bxs-edit'></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteUser{{ $usr->id }}">
                                            <i class='bx bx-trash'></i>
                                        </button>


                                    </td>
                                </tr>
                                <div class="modal fade" id="dokktpModal{{ $usr->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">KTP {{ $usr->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($usr->dok_ktp)
                                                    <img width="100%" src="{{ asset('/') }}images/{{ $usr->dok_ktp }}"
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

                                <div class="modal fade" id="deleteUser{{ $usr->id }}" tabindex="-1"
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
                                                    {{ $usr->name }} ?</div>
                                                <form action="{{ route('destroy.pengguna', $usr->id) }}" method="post"
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
                                <td colspan="6">Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div><br><br>
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item {{ $user->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $user->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @foreach ($user->getUrlRange(1, $user->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $user->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $user->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $user->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
