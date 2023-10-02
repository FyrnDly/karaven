@extends('layout.simple')
@section('title', 'Lupa Kata Sandi')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form method="POST" action="{{ route('password.email') }}" class="d-flex flex-column music w-100">
                    <h2 class="auth">Lupa Kata Sandi</h2>
                    <p>Anda Lupa Kata Sandi? Tidak Masalah, hanya perlu alamat email anda untuk mengubah kata sandi anda melalui pesan email yang dikirim</p>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Alamat Email Untuk Mengatur Ulang Kata Sandi">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Alamat Email Anda Masukkan Salah atau Sudah Terdaftar</strong>
                        </span>
                        @enderror
                    </div>

                    @if (session('status'))
                    <div class="mb-3">
                        <div class="success-feedback" role="alert">
                            <p>Pesan Untuk Mengubah Kata Sandi Berhasil Dikirim, <b>Cek Email Box atau kontak spam</b></p>
                        </div>
                    </div>
                    @endif

                    <div>
                        <button type="submit" class="btn btn-primary w-100 text-center mb-2">Kirim Email Ubah Kata Sandi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

