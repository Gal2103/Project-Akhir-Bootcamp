@extends('layouts.master')

@section('title')
    Halaman List Genre Film
@endsection

@section('content')


<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Genre</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($genre as $key => $item)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$item->nama}}</td>
        <td>
            <form action="/genre/{{$item->id}}" method="POST">
                <a href="/genre/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/genre/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("Delete")
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
        </td>
      </tr>
      @empty
          <tr>
            <td>Tabel Genre Belum Tersedia!</td>
          </tr>
      @endforelse
      
    </tbody>
  </table>

  <a href="/genre/create" class="btn btn-sm btn-primary">Tambah Genre</a>
@endsection