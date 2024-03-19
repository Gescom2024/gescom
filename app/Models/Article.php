<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'suivi_stock',
        'prix_achat',
        'dernier_prix_achat',
        'famille_id',
        'depot_id',
        'id_founisseur'
        // Ajoutez d'autres champs que vous souhaitez autoriser à être attribués en masse ici
    ];





    // Relation avec la famille
    public function famille()
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    // Relation avec le dépôt
    public function depot()
    {
        return $this->belongsTo(Depot::class, 'depot_id');
    }

    // Relation avec le fournisseur
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
    }

        //liaison avec la table fournisseurs

    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class);
    }




    public function fournisseurs1()
    {
        return $this->belongsToMany(Fournisseur::class, 'article_fournisseur', 'article_id', 'fournisseur_id')->withTimestamps();
    }
}

