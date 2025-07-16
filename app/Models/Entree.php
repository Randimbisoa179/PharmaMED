<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    use HasFactory;

    protected $primaryKey = 'numEntree'; //Définir la clé primaire
    public $incrementing = false;
    protected $fillable = ['numEntree', 'stockEntree', 'dateEntree', 'numMedoc'];

    //Relation avec le modèle Produit
    public function produit(){
        return $this->belongsTo(Produit::class, 'numMedoc', 'numMedoc');
    } 
}
