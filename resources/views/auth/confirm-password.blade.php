@extends('layout.simple')
@section('title', 'Konfirmasi Kata Sandi')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form method="POST" action="{{ route('password.confirm') }}" class="d-flex flex-column music w-100">
                    <h2 class="auth">Konfirmasi Kata Sandi</h2>
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Kata Sandi Anda">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Kata Sandi Anda Masukkan Salah</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100 text-center mb-2">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

