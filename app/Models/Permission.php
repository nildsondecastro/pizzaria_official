<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $primaryKey = 'per_id';

    protected $fillable = [
        'cliente',     
        'funcionario',      
        'gerente',     
        'administrador', 
        'usr_id',
    ];
}
