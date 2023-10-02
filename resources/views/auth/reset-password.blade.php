@extends('layout.simple')
@section('title', 'Ubah Kata Sandi')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form method="POST" action="{{ route('password.store') }}" class="d-flex flex-column music w-100">
                    <h2 class="auth">Ubah Kata Sandi</h2>
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Alamat Email Anda Masukkan Salah</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan Kata Sandi Baru Anda">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Kata Sandi Anda Masukkan Salah Atau Tidak Sesuai</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan Kembali Kata Sandi Anda">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100 text-center mb-2">Ubah Kata Sandi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

