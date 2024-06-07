@extends('layouts.master')

@section('title')
    Halaman Detail Genre
@endsection

@section('content')
<h1 class=" text-white">{{$genre->nama}}</h1>

<a href="/genre" class="btn btn-sm btn-danger">Kembali</a>
@endsection