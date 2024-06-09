<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peran;

class PeranController extends Controller
{
    public function store(Request $request, $id)
    {

        $request->validate(
            [
                'nama' => 'required',
                'cast_id' => 'required'
            ]
        );


        Peran::create(
            [
                'nama' => $request->input('nama'),
                'cast_id' => $request->input('cast_id'),
                'film_id' => $id
            ]
        );
        return redirect('/film/' . $id);
    }
}
