@extends('layouts.master')

@section('title')
    Halaman Update Profile
@endsection

@section('content')
<form method="POST" action="/profil/{{$profil->id}}">
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
    <p class="text-white">Nama User : {{$profil->currentUser->name}}</p>
    <p class="text-white">Email User : {{$profil->currentUser->email}}</p>
    <div class="form-group">
      <label class=" text-white">Umur</label>
      <input type="number" value="{{$profil->umur}}" class="form-control" name="umur">
    </div>
    <div class="form-group">
      <label class=" text-white">Bio</label>
      <textarea name="bio" class="form-control" id="" cols="20" rows="10">{{$profil->bio}}</textarea>
    </div>
    <div class="form-group">
      <label class=" text-white">Alamat</label>
      <textarea name="alamat" class="form-control" id="" cols="20" rows="10">{{$profil->alamat}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection