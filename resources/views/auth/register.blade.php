@extends('layout.simple')
@section('title', 'Halaman Daftar Akun')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form method="POST" action="{{ route('register') }}" class="d-flex flex-column music w-100">
                    <h2 class="auth">Halaman Pendaftaran</h2>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama Lengkap Anda">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>Masukkan Nama Anda</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Alamat Email Anda">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Alamat Email Anda Masukkan Salah atau Sudah Terdaftar</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan Kata Sandi Anda">
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
                        <button type="submit" class="btn btn-primary w-100 text-center mb-2">Daftar Sekarang</button>
                        <a href="{{ route('login') }}" class="btn btn-black no-fill w-100 text-center">
                            <p>Sudah Punya Akun ? <b>Masuk</b></p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

