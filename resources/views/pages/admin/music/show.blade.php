@extends('layout.app')
@section('title', 'Daftar Lagu-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <table class="table table-striped table-dark table-hover table-borderless ">
        <thead>
            <tr>
                <th scope="col">Judul Lagu</th>
                <th scope="col">Penyanyi</th>
                <th scope="col">Genre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($musics as $music)
            <tr>
                <td>{{ $music->title }}</td>
                <td>{{ $music->artist->name }}</td>
                <td>{{ $music->genre->name }}</td>
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
        </tbody>
    </table>
</main>
@endsection

