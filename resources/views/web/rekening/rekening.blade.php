@extends('web.template.content')

@section('title')
    Rekening
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9 d-flex align-items-center">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Rekening</h4>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="/rekening/create" class="btn btn-primary">Tambah</a>
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
                    <h5 class="card-header">Rekening</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Rekening</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Bank</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count(@$rekening) > 0)
                            @foreach ($rekening as $index => $dtrek)
                                <tr>
                                    <td>{{ $index + $rekening->firstItem() }}</td>
                                    <td>{{ $dtrek->nama_rekening }}</td>
                                    <td>{{ $dtrek->nomor_rekening }}</td>
                                    <td>{{ $dtrek->nama_bank }}</td>
                                    <td>{{ $dtrek->keterangan }}</td>
                                    <td><a href="/rekening/{{ $dtrek->id }}/edit" class="btn btn-sm btn-warning"><i
                                                class='bx bxs-edit'></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteRekening{{ $dtrek->id }}">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </td>
                                </tr>
                                {{-- delete --}}

                                <div class="modal fade" id="deleteRekening{{ $dtrek->id }}" tabindex="-1"
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
                                                    {{ $dtrek->nama_rekening }} ?</div>
                                                <form action="{{ route('rekening.destroy', $dtrek->id) }}" method="post"
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
                    <li class="page-item {{ $rekening->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $rekening->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @foreach ($rekening->getUrlRange(1, $rekening->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $rekening->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <li class="page-item {{ $rekening->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $rekening->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
