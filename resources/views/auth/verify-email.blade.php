@extends('layout.simple')
@section('title', 'Pesan Verifikasi')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form method="POST" action="{{ route('verification.send') }}" class="d-flex flex-column music w-100">
                    <h2 class="auth">Verifikasi Email</h2>
                    <p>Terimakasih telah melakukan Pendaftaran, Silahkan lakukan Verifikasi Email dengan melihat Email Box atau Kontak Spam. <b>Tidak menerima Email Verifikasi atau Link tidak bisa digunakan?</b> Kirim Ulang Email Verifikasi</p>
                    @csrf

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-3">
                        <div class="success-feedback" role="alert">
                            <p>Email Verifikasi Baru Saja Berhasil Dikirim, <b>Cek Email Box atau Kontak Spam</b></p>
                        </div>
                    </div>
                    @endif

                    <div>
                        <button type="submit" class="btn btn-primary w-100 text-center mb-2">Kirim Email Verifikasi Ulang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

