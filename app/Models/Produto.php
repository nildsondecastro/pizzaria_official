<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $primaryKey = 'pro_id';

    protected $fillable = [
        'pro_nome',     
        'pro_valor',      
        'pro_status',
    ];
}
