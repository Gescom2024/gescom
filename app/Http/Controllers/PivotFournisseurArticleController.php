<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pivot_fournisseur_article;
use Illuminate\Support\Facades\DB;


class PivotFournisseurArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donnees = DB::table('pivot_fournisseur_articles')
                        ->select('pivot_fournisseur_articles.id', 'fournisseurs.nom AS nom_fournisseur', 'articles.nom AS nom_article', 'pivot_fournisseur_articles.created_at', 'pivot_fournisseur_articles.updated_at')
                        ->join('fournisseurs', 'pivot_fournisseur_articles.fournisseur_id', '=', 'fournisseurs.id')
                        ->join('articles', 'pivot_fournisseur_articles.article_id', '=', 'articles.id')
                        ->get();

        return $donnees;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
