<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Film;
use App\Models\Genre;
use App\Models\cast;

    

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();

        return view('film.tampil', ['film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::get();
        return view('film.tambah', ['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required|min:5',
                'genre_id' => 'required',
                'ringkasan' => 'required',
                'tahun' => 'required',
                'poster' => 'required|mimes:png,jpg,jpeg',
            ],
            [
                'judul.required' => 'Judul Genre harus diisi tidak boleh kosong!',
                'genre_id.required' => 'Genre harus diisi tidak boleh kosong!',
                'ringkasan.required' => 'Ringkasan harus diisi tidak boleh kosong!',
                'tahun.required' => 'Tahun harus diisi tidak boleh kosong!',
                'poster.mimes' => 'Poster Film harus diisi tidak boleh kosong!',
            ]
        );



        $fileName = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('image'), $fileName);



        $film = new Film();

        $film->judul = $request->input('judul');
        $film->genre_id = $request->input('genre_id');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->poster = $fileName;


        $film->save();

        return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);
        $cast = cast::get();

        return view('film.detail    ',['film'=> $film, 'cast'=> $cast]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genre = Genre::get();

        return view('film.update', ['film' => $film, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul' => 'required|min:5',
                'genre_id' => 'required',
                'ringkasan' => 'required',
                'tahun' => 'required',
                'poster' => 'image|mimes:png,jpg,jpeg',
            ],
        );

            $film = Film::find($id);

            if($request->has('poster')){
                $path = 'image/';
                File::delete($path . $film->poster);

                $fileName = time() . '.' . $request->poster->extension();

                $request->poster->move(public_path('image'), $fileName);

                $film->poster = $fileName;

                $film->save();
            
            }
            $film->judul = $request->input('judul');
            $film->genre_id = $request->input('genre_id');
            $film->ringkasan = $request->input('ringkasan');
            $film->tahun = $request->input('tahun');
            $film->save();
            return redirect('/film');
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        $path = 'image/';

        File::delete($path. $film->poster);
        
        $film->delete();

        return redirect('/film');
    }   
}
