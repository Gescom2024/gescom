<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // use HasFactory;
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
}

