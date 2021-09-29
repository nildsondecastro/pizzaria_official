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

    public function ingredientes()
    {
    //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
    return $this->belongsToMany(
            Ingrediente::class, 'produtos_ingredientes', 'pro_id', 'ing_id');
    }
}
