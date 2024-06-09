@extends('layouts.master')
@section('title')
Halaman Detail Cast
@endsection

@section('content')

<hi class=" text-white">{{$cast->nama}}</hi>
<p class=" text-white">{{$cast->umur}}</p>
<p class=" text-white">{{$cast->Bio}}</p>

<hr>

<h2 class="text-white">Peran Film</h2>
@forelse ($cast->listPeran as $item)
  <hr>
  <div class="card">
    <div class="card-header">
      {{$item->castId->nama}}
    </div>
    <div class="card-body">
      <h5 class="card-title">Judul Film : {{$item->namaFilm->judul}}</h5>
      <h5 class="card-text">Berperan Sebagai : {{$item->nama}}</h5>
    </div>
  </div>
@empty
    <h4 class="text-white">Tidak ada Cast</h4>
@endforelse

<hr>

<a href="/cast" class="btn btn-danger">Kembali</a>

@endsection