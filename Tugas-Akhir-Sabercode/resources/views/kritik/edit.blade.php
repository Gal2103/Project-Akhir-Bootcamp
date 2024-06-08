@extends('layouts.master')

@section('title')
    Halaman Tambah Review Film
@endsection

@section('content')
<form method="POST" action="/kritik/{{$kritik->id}}">
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
    @method('put')
    <div class="form-group">
        <label class="text-white">Nama Anda</label>
        <br>
        <select name="users_id" class="form-control" id="">
            <option value="">------------------------------------------------  Pilih Nama Anda  ------------------------------------------------</option>
              @forelse ($users as $item)
                @if ($item->id === $kritik->users_id)
                    <option value="{{$item->id}}" selected>{{$item->name}}</option> 
                @else
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
                  
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
                @if ($item->id === $kritik->film_id)
                    <option value="{{$item->id}}" selected>{{$item->judul}}</option>
                @else
                    <option value="{{$item->id}}">{{$item->judul}}</option>
                @endif
                  
              @empty
                  Tidak Ada Film
              @endforelse
        </select>
    </div>
    <br>
    <br>

    <div class="form-group">
      <label class=" text-white">Review</label>
      <textarea name="content" class="form-control" id="" cols="30" rows="10">{{$kritik->content}}</textarea>
    </div>
    <div class="form-group">
      <label class=" text-white">Rating</label>
      <input type="number" value="{{$kritik->point}}" class="form-control" name="point">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection