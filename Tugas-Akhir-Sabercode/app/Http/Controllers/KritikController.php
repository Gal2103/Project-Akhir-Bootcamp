<?php

namespace App\Http\Controllers;

use App\Models\Kritik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KritikController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'content' => 'required',
                'point' => 'required|max:100',
            ]
        );

        $idUser = Auth::id();

        Kritik::create(
            [
                'content' => $request->input('content'),
                'point' => $request->input('point'),
                'users_id' => $idUser,
                'film_id' => $id
            ]
        );
        return redirect('/film/' . $id);
    }
}
