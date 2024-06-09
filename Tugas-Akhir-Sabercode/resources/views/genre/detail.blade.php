@extends('layouts.master')

@section('title')
    Halaman Detail Genre
@endsection

@section('content')

<h1 class=" text-white">{{$genre->nama}}</h1>
<a href="/genre" class="btn btn-danger">Kembali</a>
<hr>
<div class="row">

    @forelse ($genre ->listFilm as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('image/'.$item->poster)}}" class="card-img-top" width="200px" height="300px" alt="...">
                <div class="card-body">
                    <h4>{{$item->judul}}</h4>
                    <p class="card-text">{{ Str::limit($item->ringkasan, 50)}}</p>
                    <a href="/film/{{$item->id}}" class="btn btn-primary btn-block">Detail</a>
                </div>
            </div>
        </div>
    @empty
        <h2>Tidak Ada Film</h2>
    @endforelse


@endsection