<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemdopedido extends Model
{
    use HasFactory;

    protected $primaryKey = 'itp_id';

    protected $fillable = [
        'itp_nome',     
        'itp_valor',      
        'ped_id',
        'car_id',
    ];
}
