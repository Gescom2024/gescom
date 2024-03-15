<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'activite' => 'required|string',
            'adresse' => 'required|string',
            'complement' => 'required|string',
            'code_postal' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|string',
            'capital' => 'required|numeric',
        ]);

        // Création de la société
        $entreprise = new Societe;
        $entreprise->nom = $request->nom;
        $entreprise->activite = $request->activite;
        $entreprise->adresse = $request->adresse;
        $entreprise->complement = $request->complement;
        $entreprise->code_postal = $request->code_postal;
        $entreprise->region = $request->region;
        $entreprise->ville = $request->ville;
        $entreprise->pays = $request->pays;
        $entreprise->telephone = $request->telephone;
        $entreprise->email = $request->email;
        $entreprise->capital = $request->capital;
        // Enregistrement dans la base de données
        $entreprise->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Société insérée avec succès'], 201);
    }

    public function getFournisseur(){
        $societe = Societe::all();
        return response()->json($societe, 200);

    }

    public function updateFournisseur(Request $request,$id){
        $societe = Societe::find($id);

        if (!$societe) {
             return response()->json(['Message => Societé inexistante'],404);
        }

        $request->validate([
            'nom' => 'required|string',
            'activite' => 'required|string',
            'adresse' => 'required|string',
            'complement' => 'required|string',
            'code_postal' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|string',
            'capital' => 'numeric',
        ]);



        $societe->nom = $request->nom ?? $societe->nom;
        $societe->activite = $request->activite ?? $societe->activite;
        $societe->adresse = $request->adresse ?? $societe->adresse;
        $societe->complement = $request->complement ?? $societe->complement;
        $societe->code_postal = $request->code_postal ?? $societe->code_postal;
        $societe->region = $request->region ?? $societe->region;
        $societe->ville = $request->ville ??  $societe->ville ;
        $societe->pays = $request->pays ?? $societe->pays;
        $societe->telephone = $request->telephone ??  $societe->telephone;
        $societe->email = $request->email ?? $societe->email;
        $societe->capital = $request->capital ?? $societe->capital;
        // Enregistrement dans la base de données
        $societe->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Société modifiée avec succès'], 200);
    }








    public function supprimer(Request $request,$id){
        $societe = Societe::find($id);

        if (!$societe) {
            return response()->json(['Message => Societé inexistante'],404);
       }
       $societe->delete();
       return response()->json(['message' => 'Société supprimée avec succès'], 200);
    }
}
