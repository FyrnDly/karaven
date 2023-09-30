@extends('layout.app')
@section('title', 'Daftar Gnere-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <a href="{{ route('admin.genre.create') }}" class="btn btn-primary mt-4">Tambah Genre Baru</a>
    <table class="table table-striped table-dark table-hover table-borderless ">
        <thead>
            <tr class="text-center">
                <th scope="col">Genre</th>
                <th scope="col">Gambar</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($genres)!=0)
            @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre->name }}</td>
                <td class="text-center">
                    @if($genre->thumbnail)
                    <img src="{{ $genre->thumbnail }}" alt="{{ $genre->name }}" width="50px" height="40px">
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.genre.edit',$genre->slug) }}" class="btn btn-primary d-inline-block m-2">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.genre.delete',$genre->id) }}" method="post" class="d-inline-block m-2">
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
                    <a href="{{ route('admin.genre.create') }}" class="btn btn-primary">Tambahkan Genre Baru</a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</main>
@endsection
