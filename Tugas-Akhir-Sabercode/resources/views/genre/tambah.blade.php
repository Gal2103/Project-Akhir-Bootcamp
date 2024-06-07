@extends('layouts.master')

@section('title')
    Halaman Tambah Genre Film
@endsection

@section('content')
<form method="POST" action="/genre">
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
      <label class=" text-white">Nama Genre</label>
      <input type="text" class="form-control" name="nama">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection