<?php

namespace App\Http\Controllers;

use App\Models\Kritik;
use App\Models\User;
use App\Models\Film;
use Illuminate\Http\Request;

class KritikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kritik = Kritik::all();

        return view('kritik.tampilan', ['kritik' => $kritik]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $film = Film::get();
        return view('kritik.tambah', ['users' => $users, 'film'=> $film]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'users_id' => 'required',
                'film_id' => 'required',
                'content' => 'required',
                'point' => 'required|max:100',
            ],
            [
                'users_id.required' => 'Nama harus diisi tidak boleh kosong!',
                'film_id.required' => 'Film harus diisi tidak boleh kosong!',
                'content.required' => 'Review harus diisi tidak boleh kosong!',
                'point.required' => 'Rating harus diisi tidak boleh kosong!',
            ]
        );

        $kritik = new Kritik();

        $kritik->users_id = $request->input('users_id');
        $kritik->film_id = $request->input('film_id');
        $kritik->content = $request->input('content');
        $kritik->point = $request->input('point');

        $kritik->save();

        return redirect('/kritik');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kritik = Kritik::find($id);
    

        return view('kritik.detail', ['kritik' => $kritik]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kritik = Kritik::find($id);
        $users = User::get();
        $film = Film::get();

        return view('kritik.edit', ['kritik' => $kritik, 'users' => $users, 'film'=> $film]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'users_id' => 'required',
                'film_id' => 'required',
                'content' => 'required',
                'point' => 'required|max:100',
            ],
            [
                'users_id.required' => 'Nama harus diisi tidak boleh kosong!',
                'film_id.required' => 'Film harus diisi tidak boleh kosong!',
                'content.required' => 'Review harus diisi tidak boleh kosong!',
                'point.required' => 'Rating harus diisi tidak boleh kosong!',
            ]
        );

        Kritik::where('id', $id)
            ->update(
                [
                    'users_id' => $request->input('users_id'),
                    'film_id' => $request->input('film_id'),
                    'content' => $request->input('content'),
                    'point' => $request->input('point'),
                ]
            );
        return redirect('/kritik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kritik::where('id', $id)->delete();

        return redirect('/kritik');
    }
}
