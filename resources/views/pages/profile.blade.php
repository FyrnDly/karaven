@extends('layout.simple')
@section('title', 'Informasi Akun '.$user->name)

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <div class="row justify-content-center aligin-items-center h-100">
        <div class="col-md-10 col-lg-8">
            <div class="card card-form">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="POST" action="{{ route('profile.update') }}" class="d-flex flex-column music w-100">
                    <h3>Informasi Akun {{ $user->name }}</h3>
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>Masukkan Nama Anda</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required @disabled($user->email_verified_at) autocomplete="username">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Alamat Email Anda Masukkan Sudah Terdaftar</strong>
                        </span>
                        @enderror
                        @if(! $user->email_verified_at)
                        <div class="m-1">
                            Anda Belum Verifikasi Email
                            <button form="send-verification" class="btn btn-black no-fill m-0 p-0">
                                <b>Klik Untuk Verifikasi Email</b>
                            </button>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                        <div class="success-feedback" role="alert">
                            <p>
                                Pesan Verifikasi Baru Saja Dikirim
                            </p>
                        </div>
                        @endif
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100 mb-2">Perbarui Informasi</button>
                    </div>

                    @if (session('status') === 'profile-updated')
                    <div class="success-feedback" role="alert">
                        <p>Data Telah Diperbarui</p>
                    </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="col-md-10 col-lg-6">
            <div class="card card-form">
                <form method="POST" action="{{ route('password.update') }}" class="d-flex flex-column music w-100">
                    <h3>Ubah Kata Sandi</h3>
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                        <input id="current_password" type="password" class="form-control @error('current_password','updatePassword') is-invalid @enderror" name="current_password" required autocomplete="current_password" placeholder="Masukkan Kata Sandi Lama Anda">
                        @error('current_password','updatePassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>Kata Sandi Anda Masukkan Salah</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password','updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan Kata Sandi Baru Anda">
                        @error('password','updatePassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>Kata Sandi Baru Yang Anda Masukkan Salah Atau Tidak Sesuai</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan Kembali Kata Sandi Baru Anda">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-white w-100 mb-2">Ubah Kata Sandi</button>
                    </div>

                    @if (session('status') === 'password-updated')
                    <div class="success-feedback" role="alert">
                        <p>Kata Sandi Telah Diperbarui</p>
                    </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="col-md-10 col-lg-6">
            <div class="card card-form">
                <form method="POST" action="{{ route('profile.destroy') }}" class="d-flex flex-column music w-100">
                    <h3>Hapus Akun</h3>
                    <p>Perlu diingat jika akun yang telah dihapus <b>tidak akan dapat dipulihkan</b></p>
                    @csrf
                    @method('delete')
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan Kata Sandi Baru Anda">
                        @error('password', 'userDeletion')
                        <span class="invalid-feedback" role="alert">
                            <strong>Kata Sandi Anda Masukkan Salah Atau Tidak Sesuai</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <button type="button" class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus Akun</button>
                    </div>

                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Akun {{ Auth::user()->name }}</h1>
                                    <button type="button" class="btn btn-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda Yakin Ingin Menghapus Akun {{ Auth::user()->name }}. <b>Perlu Diingat Akun Tidak Dapat Dipulihkan, Setelah Dihapus</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-white">Hapus</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

