@extends('layouts.master')

@section('title')
    Halaman Tampil Film
@endsection

@section('content')
<a href="/film/create" class="btn btn-primary">Tambah Film</a>
<hr>

<div class="row">

    @forelse ($film as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('image/'.$item->poster)}}" class="card-img-top" width="200px" height="300px" alt="...">
                <div class="card-body">
                    <h4>{{$item->judul}}</h4>
                    <a class="badge badge-success" href="/genre/{{$item->genre->id}}">{{$item->genre->nama}}</a>
                    <p class="card-text">{{ Str::limit($item->ringkasan, 50)}}</p>
                    <a href="/film/{{$item->id}}" class="btn btn-primary btn-block">Detail</a>

                    <div class="row my-3">
                        <div class="col">
                            <a href="/film/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                        </div>
                        <div class="col">
                            <form action="/film/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')

                                <input type="submit" class="btn btn-danger btn-block" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Tidak Ada Film</h2>
    @endforelse
@endsection