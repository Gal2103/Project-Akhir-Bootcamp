@extends('layouts.master')

@section('title')
    Halaman Detail Review
@endsection

@section('content')
<h3 class=" text-white"> User ID : {{$kritik->users_id}}</h3>
<h3 class=" text-white">Film ID : {{$kritik->film_id}}</h3>
<h3 class=" text-white">Review :</h3>
<p class=" text-white">{{$kritik->content}}</p>
<p class=" text-white">Rating Film : {{$kritik->point}}</p>

<a href="/kritik" class="btn btn-sm btn-danger">Kembali</a>
@endsection