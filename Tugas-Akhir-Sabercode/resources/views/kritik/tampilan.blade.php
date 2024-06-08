@extends('layouts.master')

@section('title')
    Halaman Review Film
@endsection

@section('content')

<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">User ID</th>
        <th scope="col">Film ID</th>
        <th scope="col">Review</th>
        <th scope="col">Rating</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($kritik as $key => $item)
      <tr>
        <td>{{$item->users_id}}</td>
        <td>{{$item->film_id}}</td>
        <td>{{$item->content}}</td>
        <td>{{$item->point}}</td>
        <td>
            <form action="/kritik/{{$item->id}}" method="POST">
                <a href="/kritik/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/kritik/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("Delete")
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
        </td>
      </tr>
      @empty
          <tr>
            <td>Tabel Review Belum Tersedia!</td>
          </tr>
      @endforelse
      
    </tbody>
  </table>

  <a href="/kritik/create" class="btn btn-sm btn-primary">Tambah Review</a>
@endsection