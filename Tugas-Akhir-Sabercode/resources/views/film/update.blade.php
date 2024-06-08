@extends('layouts.master')

@section('title')
    Halaman Edit Film
@endsection

@section('content')
<form method="POST" action="/film/{{ $film->id }}" enctype="multipart/form-data"> 
    {{-- validation --}}
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
  
    {{-- form input --}}
    @csrf
    @method('put')
      <div class="form-group text-white">
          <label>Judul Film</label>
          <input type="text" class="form-control" name="judul" value="{{ $film->judul }}" id="judul">
      </div>

      <div class="form-group">
        <label class="text-white">Genre Film</label>
        <br>
        <select name="genre_id" class="form-control" id="">
            <option value="">----------------------------------------------------  Pilih Genre  ----------------------------------------------------</option>
              @forelse ($genre as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
              @empty
                  Tidak Ada Genre
              @endforelse
        </select>
    </div>
    <br>
    <br>

      <div class="form-group text-white">
          <label >Ringkasan</label>
          <textarea class="form-control" name="ringkasan" id= "ringkasan" rows="3">{{ $film->content }}</textarea>
      </div>

      <div class="form-group text-white">
          <label>Tahun</label>
          <input type="number" class="form-control" name="tahun" id="tahun">
      </div>
      
      <div class="form-group text-white">
          <label>Poster</label>
          <input type="file" class="form-control" name="poster">
      </div>
      
      
      <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary text-white">Submit</button>
      </div>
  </form>
@endsection 