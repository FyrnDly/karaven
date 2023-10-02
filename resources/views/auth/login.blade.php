@extends('layout.simple')
@section('title', 'Halaman Masuk')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form method="POST" action="{{ route('login') }}" class="d-flex flex-column music w-100">
                    <h2 class="auth">Halaman Masuk</h2>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Alamat Email Anda">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Alamat Email Anda Masukkan Salah atau Tidak Terdaftar</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Kata Sandi Untuk Masuk">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Kata Sandi Anda Masukkan Salah, Silahkan Coba Lagi</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100 mb-2">Masuk</button>
                        <div class="text-end">
                            <a href="{{ route('register') }}" class="btn btn-black no-fill m-2">
                                <p>Belum Punya Akun ? <b>Daftar Sekarang</b></p>
                            </a>
                            @if (Route::has('password.request'))
                            <a class="btn btn-black no-fill m-2" href="{{ route('password.request') }}">
                                <p>Lupa Kata Sandi?</p>
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

