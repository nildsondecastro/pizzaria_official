<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_id';

    protected $fillable = [
        'car_taxa',     
        'car_valor',      
        'car_total',
        'usr_id',
    ];

    public function itens()
    {
        return $this->hasMany(Itemdopedido::class, 'car_id', 'car_id');
    }
}
