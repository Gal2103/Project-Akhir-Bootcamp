<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kritik extends Model
{
    use HasFactory;

    protected $table = 'kritik';

    protected $fillable = ['users_id', 'film_id', 'content', 'point'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
