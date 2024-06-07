@extends('layouts.master')
@section('title')
Halaman Tampil Cast
@endsection

@section('content')

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Bio</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cast as $key => $item)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->nama}}</td>
            <td>{{$item->umur}}</td>
            <td>{{$item->Bio}}</td>
            <td>
                <form action="/cast/{{$item->id}}" method="POST">
                    <a href="/cast/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/cast/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    @csrf
                    @method("DELETE")
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Cast tidak ada</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center mt-3">
    <a href="/cast/create" class="btn btn-sm btn-primary">Tambah</a>
</div>

@endsection
