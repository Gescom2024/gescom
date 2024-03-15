<?php

namespace App\Http\Controllers;

use App\Models\Unite_achats_ventes;
use Illuminate\Http\Request;

class UniteAchatVenteController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required|string',
            'code_EDI' => 'required|string'
        ]);
        // $uniteAchatVente->created_at = $request->created_at;
        // $uniteAchatVente->updated_at = $request->updated_at;
        // Création de la société
        $uniteAchatVente = new Unite_achats_ventes;
        $uniteAchatVente->intitule = $request->intitule;
        $uniteAchatVente->code_EDI = $request->code_EDI;


        // Enregistrement dans la base de données
        $uniteAchatVente->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'uniteAchatVente insérée avec succès'], 201);
    }





    public function getuniteAchatVente()
    {
        $uniteAchatVente = Unite_achats_ventes::all();
        return response()->json($uniteAchatVente, 200);
    }






    public function updateuniteAchatVente(Request $request, $id)
    {
        $uniteAchatVente = Unite_achats_ventes::find($id);

        if (!$uniteAchatVente) {
            return response()->json(['Message => uniteAchatVente inexistante'], 404);
        }

        $request->validate([
            'intitule' => 'required|string',
            'code_EDI' => 'required|string'
        ]);



        $uniteAchatVente->intitule = $request->intitule ?? $uniteAchatVente->intitule;
        $uniteAchatVente->code_EDI = $request->code_EDI ?? $uniteAchatVente->code_EDI;

        $uniteAchatVente->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'uniteAchatVente modifiée avec succès'], 200);
    }








    public function supprimer(Request $request, $id)
    {
        $uniteAchatVente = Unite_achats_ventes::find($id);

        if (!$uniteAchatVente) {
            return response()->json(['Message => uniteAchatVente inexistante'], 404);
        }
        $uniteAchatVente->delete();
        return response()->json(['message' => 'uniteAchatVente supprimée avec succès'], 200);
    }
}
