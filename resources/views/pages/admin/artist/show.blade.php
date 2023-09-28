@extends('layout.app')
@section('title', 'Daftar Lagu-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <a href="{{ route('admin.artist.create') }}" class="btn btn-primary mt-4">Tambah Penyanyi Baru</a>
    <table class="table table-striped table-dark table-hover table-borderless ">
        <thead>
            <tr class="text-center">
                <th scope="col">Judul Lagu</th>
                <th scope="col">Penyanyi</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $artist)
            <tr>
                <td>{{ $artist->name }}</td>
                <td class="text-center">
                    @if($artist->thumbnail)
                    <img src="{{ $artist->thumbnail }}" alt="{{ $artist->name }}" width="100px" height="100px">
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.artist.edit',$artist->slug) }}" class="btn btn-primary d-inline-block m-2">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.artist.delete',$artist->id) }}" method="post" class="d-inline-block m-2">
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
