<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $primaryKey = 'ing_id';

    protected $fillable = [
        'ing_nome',
    ];
}
