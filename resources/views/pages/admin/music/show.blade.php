@extends('layout.app')
@section('title', 'Daftar Lagu-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <a href="{{ route('admin.music.create') }}" class="btn btn-primary mt-4">Tambah Lagu Baru</a>
    <table class="table table-striped table-dark table-hover table-borderless ">
        <thead>
            <tr class="text-center">
                <th scope="col">Judul Lagu</th>
                <th scope="col">Penyanyi</th>
                <th scope="col">Genre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($musics)!=0)
            @foreach ($musics as $music)
            <tr>
                <td>{{ $music->title }}</td>
                <td class="text-center">{{ $music->artist->name }}</td>
                <td class="text-center">{{ $music->genre->name }}</td>
                <td class="d-flex gap-4">
                    <a href="{{ route('admin.music.edit',$music->slug) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.music.delete',$music->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-black outline">
                            <i class="bi bi-trash2"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4" class="text-center">
                    <a href="{{ route('admin.music.create') }}" class="btn btn-primary">Tambahkan Lagu Baru</a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</main>
@endsection
