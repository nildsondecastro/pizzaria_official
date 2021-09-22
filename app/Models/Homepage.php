<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $primaryKey = 'hom_id';

    protected $fillable = [
        'hom_faixa_decorativa',     
        'hom_nome',      
        'hom_telefone',     
        'hom_local', 
        'hom_minimo',
        'hom_info1',     
        'hom_info2', 
        'hom_tempo_atendimento',
    ];
}
