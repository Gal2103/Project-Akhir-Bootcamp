@extends('layouts.master')
@section('title')
    Halaman Detail Film
@endsection
@section('content')  
   
<img src="{{ asset('image/'.$film->poster) }}" class="card-img-top" alt="...">
<h3 class="p-2 mb-1 bg-light text-dark">{{$film->judul}}</h3>
<p class="card-text text-white">{{ $film->ringkasan }}</p>


<hr>

<h4 class="p-2 mb-1 bg-info text-white">Tambah Cast Film</h4>
<form method="POST" action="/peran/{{$film->id}}">
  {{-- Validation --}}
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  {{-- Form Input Peran--}}
  @csrf
  <div class="form-group">
    <label class="text-white">Cast Film</label>
    <br>
    <select name="cast_id" class="form-control" id="">
        <option value="">----------------------------------------------------  Pilih Cast  ----------------------------------------------------</option>
          @forelse ($cast as $item)
              <option value="{{$item->id}}">{{$item->nama}}</option>
          @empty
              Tidak Ada Cast
          @endforelse
    </select>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class="text-white">Nama Peran</label>
    <input type="text" class="form-control" name="nama">
  </div>
  <button type="submit" class="btn btn-primary">Submit Cast</button>
</form>

<hr>

<h2 class="text-white">List Cast Film</h2>
@forelse ($film->listCast as $item)
  <hr>
  <div class="card">
    <div class="card-header">
      {{$item->castId->nama}}
    </div>
    <div class="card-body">
      <h5 class="card-title">Berperan Sebagai : {{$item->nama}}</h5>
    </div>
  </div>
@empty
    <h4 class="text-white">Tidak ada Cast</h4>
@endforelse


<hr>

<h4 class="p-2 mb-1 bg-info text-white">Review Film</h4>
<form method="POST" action="/kritik/{{$film->id}}">
  {{-- Validation --}}
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  {{-- Form Input --}}
  @csrf
  <div class="form-group">
    <textarea name="content" placeholder="Berikan Review Anda Disini!" class="form-control" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <h4 class="p-2 mb-1 bg-info text-white">Beri Rating</h4>
    <input type="number" class="form-control" name="point">
  </div>
  <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

<hr>

<h2 class="text-white">List Review</h2>
@forelse ($film->listReview as $item)
  <hr>
  <div class="card">
    <div class="card-header">
      {{$item->createdBy->name}}
    </div>
    <div class="card-body">
      <h5 class="card-title">Rating : {{$item->point}}</h5>
      <p class="card-text">{{$item->content}}</p>
    </div>
  </div>
@empty
    <h4 class="text-white">Tidak ada Review</h4>
@endforelse

<hr>
<a href="/film" class="btn btn-danger">Kembali</a>
         
@endsection