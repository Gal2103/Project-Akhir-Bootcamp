@extends('layouts.master')

@section('title')
    Halaman Edit Genre
@endsection

@section('content')
<form method="POST" action="/genre/{{$genre->id}}">
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
    @method("put")
    <div class="form-group">
      <label class=" text-white">Nama Genre</label>
      <input type="text" value="{{$genre->nama}}" class="form-control" name="nama">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection