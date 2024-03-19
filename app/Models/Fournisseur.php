<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    //liaison avec la table articles

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }


    public function articles1()
    {
        return $this->belongsToMany(Article::class, 'article_fournisseur', 'fournisseur_id', 'article_id')->withTimestamps();
    }
}
