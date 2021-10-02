<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $primaryKey = 'bai_id';

    protected $fillable = [
        'bai_nome',     
        'bai_taxa',     
        'status', 
    ];
}
