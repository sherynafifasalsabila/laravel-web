@extends('layouts.admin.app')
@section('content')

    {{-- Breadcrumb --}}
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}">User</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit User
                </li>
            </ol>
        </nav>


        {{-- Judul Halaman --}}
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">Form untuk mengubah data User.</p>
            </div>


            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
        </div>
    </div>


    {{-- Form Edit user --}}
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">


                    {{-- Menampilkan Pesan Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">

                            {{-- Name dan Email --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name', $dataUser->name) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ old('email', $dataUser->email) }}" required>
                                </div>
                            </div>

                            {{-- Password dan Confirm Password --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password <small class="text-muted">(kosongkan jika tidak diubah)</small>
                                    </label>
                                    <input type="password" id="password" class="form-control" name="password">
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation">
                                </div>
                            </div>

                            {{-- Tombol --}}
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection