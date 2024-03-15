<?php

namespace App\Http\Controllers;

use App\Models\Famille;

use Illuminate\Http\Request;

class FamilleController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'suivi_stock' => 'required|string'
        ]);
        // $famille->created_at = $request->created_at;
        // $famille->updated_at = $request->updated_at;
        // Création de la société
        $famille = new Famille;
        $famille->nom = $request->nom;
        $famille->suivi_stock = $request->suivi_stock;


        // Enregistrement dans la base de données
        $famille->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Famille insérée avec succès'], 201);
    }





    public function getFamille()
    {
        $famille = Famille::all();
        return response()->json($famille, 200);
    }






    public function updateFamille(Request $request, $id)
    {
        $famille = Famille::find($id);

        if (!$famille) {
            return response()->json(['Message => Famille inexistante'], 404);
        }

        $request->validate([
            'nom' => 'required|string',
            'suivi_stock' => 'required|string'
        ]);



        $famille->nom = $request->nom ?? $famille->nom;
        $famille->suivi_stock = $request->suivi_stock ?? $famille->suivi_stock;

        $famille->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Famille modifiée avec succès'], 200);
    }




    public function findByName($nom)
    {
        $famille = Famille::where('nom', $nom)->first();
        if (!$famille) {
            return response()->json(['Message => famille inexistante'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Data" => $famille,
        ], 200);
    }



    public function supprimer(Request $request, $id)
    {
        $famille = Famille::find($id);

        if (!$famille) {
            return response()->json(['Message => Famille inexistante'], 404);
        }
        $famille->delete();
        return response()->json(['message' => 'Famille supprimée avec succès'], 200);
    }
}
