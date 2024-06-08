@extends('layouts.master')

@section('title')
    Halaman Tambah Review Film
@endsection

@section('content')
<form method="POST" action="/kritik">
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
        <label class="text-white">Nama Anda</label>
        <br>
        <select name="users_id" class="form-control" id="">
            <option value="">------------------------------------------------  Pilih Nama Anda  ------------------------------------------------</option>
              @forelse ($users as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
              @empty
                  Tidak Terdapat User
              @endforelse
        </select>
    </div>
    <br>
    <br>
    
    <div class="form-group">
        <label class="text-white">Film</label>
        <br>
        <select name="film_id" class="form-control" id="">
            <option value="">----------------------------------------------------  Pilih Film  ----------------------------------------------------</option>
              @forelse ($film as $item)
                  <option value="{{$item->id}}">{{$item->judul}}</option>
              @empty
                  Tidak Ada Film
              @endforelse
        </select>
    </div>
    <br>
    <br>

    <div class="form-group">
      <label class=" text-white">Review</label>
      <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label class=" text-white">Rating</label>
      <input type="number" class="form-control" name="point">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection