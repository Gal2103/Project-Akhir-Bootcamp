@extends('layouts.master')
@section('title')
Halaman Tambah Cast
@endsection
@section('content')

<form method="POST" action="/cast"> 
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
    <div class="text-white">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama">
    </div>
    <div class="text-white">
        <label for="umur">Umur</label>
        <input type="number" class="form-control" name="umur" id="umur">
    </div>
    <div class="text-white">
        <label for="Bio">Bio</label>
        <textarea class="form-control" name="Bio" id="Bio" rows="3"></textarea>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary text-white">Submit</button>
    </div>
</form>
@endsection
