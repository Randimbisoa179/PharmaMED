<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $primaryKey = 'numMedoc';//Clé primaire

    public $incrementing = false;//Désactiver l'auto-incrémentation

    protected $keyType = 'string';//Type de la clé primaire

    protected $fillable = [
        'numMedoc',
        'Design',
        'prix_unitaire',
        'stock',
    ];

    //Relation avec le modèle Entree
    public function entrees(){
        return $this->hasMany(Entree::class, 'numMedoc', 'numMedoc');
    }

    public function achats(){
        return $this->hasMany(Achat::class, 'numMedoc', 'numMedoc');
    }
}
