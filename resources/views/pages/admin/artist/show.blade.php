@extends('layout.app')
@section('title', 'Daftar Pennyanyi-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <a href="{{ route('admin.artist.create') }}" class="btn btn-primary mt-4">Tambah Penyanyi Baru</a>
    <table class="table table-striped table-dark table-hover table-borderless ">
        <thead>
            <tr class="text-center">
                <th scope="col">Nama Penyanyi</th>
                <th scope="col">Gambar</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($artists)!=0)
            @foreach ($artists as $artist)
            <tr>
                <td>{{ $artist->name }}</td>
                <td class="text-center">
                    @if($artist->thumbnail)
                    <img src="{{ $artist->thumbnail }}" alt="{{ $artist->name }}" width="50px" height="50px">
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
            @else
            <tr>
                <td colspan="4" class="text-center">
                    <a href="{{ route('admin.artist.create') }}" class="btn btn-primary">Tambahkan Penyanyi Baru</a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</main>
@endsection
