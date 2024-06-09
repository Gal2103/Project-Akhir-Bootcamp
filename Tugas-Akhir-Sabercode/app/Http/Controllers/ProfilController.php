<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $idUser = Auth::id();

        $profil = Profil::where('users_id', $idUser)->first();

        return view('profil.update', ["profil" => $profil]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'umur' => 'required',
                'bio' => 'required',
                'alamat' => 'required',
            ],
        );

        Profil::where('id', $id)
            ->update(
                [
                    'umur' => $request->input('umur'),
                    'bio' => $request->input('bio'),
                    'alamat' => $request->input('alamat'),
                ]
            );
        return redirect('/profil');
    }
}
