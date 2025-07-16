<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    
    public $incrementing = false; //Indique si la clé primaire est in incrément automatique

    public $timestamps = false; //Désactiver les timestamps (created_at et updated_at)

    protected $table = 'achats'; //Nom de la table dans la base de données

    //Colonnes à remplir massivement
    protected $fillable = ['numAchat', 'numMedoc', 'nomClient', 'nbr', 'dateAchat',];


    protected $primaryKey = 'numAchat'; //Clé primaire de la table

    protected $keyType = 'string'; //Type de la clé primaire

    //Relation avec le modèle Produit
    public function produits(){
        return $this->hasMany(Produit::class, 'numMedoc', 'numMedoc');
    }
    
    //Relation avec le modèle Client
    // public function client(){
    //     return $this->belongsTo(Client::class, 'nomClient', 'nomClient');
    // }

}
