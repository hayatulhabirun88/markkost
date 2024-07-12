@extends('web.template.content')

@section('title')
    Setting
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting /</span> Setting</h4>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Setting</h5>
            <div class="card-body">
                <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="video_tutorial" class="form-label">Video Tutorial</label>
                            <input type="text" class="form-control"
                                value="{{ old('video_tutorial', $setting->video_tutorial) }}" name="video_tutorial"
                                id="video_tutorial" placeholder="contoh: https://www.youtube.com/watch?v=gPloN5NvfS0" />
                        </div>
                        <div class="m-3">
                            <input type="submit" class="btn btn-primary" value="Simpan">
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
