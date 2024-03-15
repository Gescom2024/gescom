<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'famille'=> 'required|string',
            'suivi_stock' => 'required|string',
            'prix_achat'=> 'required|numeric',
            'dernier_prix_achat'=> 'required|numeric',
            'famille_id'=> 'required|numeric',
            'depot_id'=> 'required|numeric',
        ]);
  // $article->created_at = $request->created_at;
        // $article->updated_at = $request->updated_at;
        // Création de la société
        $article = new Article;
        $article->nom = $request->nom;
        $article->famille = $request->famille;
        $article->suivi_stock = $request->suivi_stock;
        $article->prix_achat = $request->prix_achat;
        $article->dernier_prix_achat = $request->dernier_prix_achat;
        $article->famille_id = $request->famille_id;
        $article->depot_id = $request->depot_id;


        // Enregistrement dans la base de données
        $article->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'article insérée avec succès'], 201);
    }





    public function getarticle(){
        $article = Article::all();
        return response()->json($article, 200);


    }






    public function updatearticle(Request $request,$id){
        $article = Article::find($id);

        if (!$article) {
             return response()->json(['Message => article inexistante'],404);
        }

        $request->validate([
            'nom' => 'required|string',
            'famille'=> 'required|string',
            'suivi_stock' => 'required|string',
            'prix_achat'=> 'required|numeric',
            'dernier_prix_achat'=> 'required|numeric',
            'famille_id'=> 'required|numeric',
            'depot_id'=> 'required|numeric',
        ]);



        // $article = new Article;
        $article->nom = $request->nom;
        $article->famille = $request->famille;
        $article->suivi_stock = $request->suivi_stock;
        $article->prix_achat = $request->prix_achat;
        $article->dernier_prix_achat = $request->dernier_prix_achat;
        $article->famille_id = $request->famille_id;
        $article->depot_id = $request->depot_id;

        $article->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'article modifiée avec succès'], 200);
    }



    public function findByName($nom)
    {
        $article = Article::where('nom', $nom)->get();
        if (!$article) {
            return response()->json(['Message => articles inexistante'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Data" => $article,
        ], 200);
    }





    public function supprimer(Request $request,$id){
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['Message => article inexistante'],404);
       }
       $article->delete();
       return response()->json(['message' => 'article supprimée avec succès'], 200);
    }

}
