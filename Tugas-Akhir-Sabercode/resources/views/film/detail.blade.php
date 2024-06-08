@extends('layouts.master')
@section('title')
    Halaman Detail Film
@endsection
@section('content')  
    

        
            <img src="{{ asset('image/'.$film->poster) }}" class="card-img-top" alt="...">
              <h3>{{$film->title}}</h3>
              <p class="card-text text-white">{{ $film->ringkasan }}</p>
              <a href="/film" class="btn btn-primary btn-block btn-sm">Kembali</a>
         

@endsection