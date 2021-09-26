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

    public function produtos()
    {
    //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
    return $this->belongsToMany(
            Produto::class,
            'produtos_ingredientes',
            'ing_id',
            'pro_id');
    }
}
