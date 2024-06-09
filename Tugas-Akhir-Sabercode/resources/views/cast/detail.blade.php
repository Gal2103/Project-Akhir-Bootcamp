@extends('layouts.master')
@section('title')
Halaman Detail Cast
@endsection

@section('content')

<hi class=" text-white">{{$cast->nama}}</hi>
<p class=" text-white">{{$cast->umur}}</p>
<p class=" text-white">{{$cast->Bio}}</p>

<a href="/cast" class="btn btn-danger">Kembali</a>

@endsection