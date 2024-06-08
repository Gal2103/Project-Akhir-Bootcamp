@extends('layouts.master')

@section('title')
    Selamat Datang Di Website Review Film
@endsection

@section('content')
@guest
<a href="/login" class="btn btn-light">Silahkan Login Terlebih Dahulu!</a>  
@endguest


<div class="col-lg-18">
    <div class="header__logo">
        <img src="{{asset ('template/img/blog/details/Dash1.jpg')}}" alt="">
    </div>
</div>


@endsection