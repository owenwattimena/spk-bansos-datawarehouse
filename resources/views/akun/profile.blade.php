@extends('templates.index')
@section('content')
<div class="container-xl px-4 mt-5">
    <!-- Custom page header alternative example-->
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
        <div class="me-4 mb-3 mb-sm-0">
            <h1 class="mb-0">Akun</h1>
            <div class="small">
                <span class="fw-500 text-primary">Ubah username dan password</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-waves mb-4 mt-5">
                <div class="card-body p-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <form id="import-form" action="{{ route('akun.profil.username') }}" method="POST" enctype="multipart/form-data" onsubmit="showConfirmationModal(event)">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input class="form-control" id="username" type="text" placeholder="Username" name="username" value="{{ old('username') ?? auth()->user()->username }}" />
                                </div>
                                <button class="btn btn-primary btn-md" type="submit">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-waves mb-4 mt-5">
                <div class="card-body p-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <form id="import-form" action="{{ route('akun.profil.password') }}" method="POST" enctype="multipart/form-data" onsubmit="showConfirmationModal(event)">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="password">Password Lama</label>
                                    <input class="form-control" id="password" type="password" placeholder="Password Lama" name="old_password" />
                                    @error('old_password') <span class="help-block">{{ $message }}</span> <br> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password">Password Baru</label>
                                    <input class="form-control" id="new_password" type="password" placeholder="Password Baru" name="password" />
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password">Konfirmasi Password</label>
                                    <input class="form-control" id="confirm_password" type="password" placeholder="Konfirmasi Password" name="password_confirmation" />
                                    @error('password_confirmation') <span class="help-block">{{ $message }}</span> <br> @enderror
                                </div>
                                <button class="btn btn-primary btn-md w-100" type="submit">
                                    Ubah Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
