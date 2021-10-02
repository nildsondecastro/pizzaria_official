<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $primaryKey = 'ped_id';

    protected $fillable = [
        'ped_taxa',     
        'ped_valor',      
        'ped_total',
        'ped_endereco',     
        'ped_telefone',      
        'ped_status',
        'usr_id',
    ];

    public function itens()
    {
        return $this->hasMany(Itemdopedido::class, 'ped_id', 'ped_id');
    }

    public function bairro()
    {
        return $this->hasOne(Bairro::class, 'bai_id', 'bai_id');
    }
}
