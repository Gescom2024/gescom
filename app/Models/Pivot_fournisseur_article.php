<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pivot_fournisseur_article extends Model
{
    use HasFactory;

    // public function article()
    // {
    //     return $this->belongsToMany(Article::class);
    // }

    // public function fournisseurs()
    // {
    //     return $this->belongsToMany(Fournisseur::class);
    // }




    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class);
    }
}
