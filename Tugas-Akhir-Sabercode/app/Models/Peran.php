<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;

    protected $table = 'peran';

    protected $fillable = ['film_id', 'cast_id', 'nama'];

    public function castId()
    {
        return $this->belongsTo(cast::class, 'cast_id');
    }

    public function namaFilm()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
}
