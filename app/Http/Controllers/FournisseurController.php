<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string'
        ]);
  // $fournisseur->created_at = $request->created_at;
        // $fournisseur->updated_at = $request->updated_at;
        // Création de la société
        $fournisseur = new Fournisseur;
        $fournisseur->nom = $request->nom;
        $fournisseur->prenom = $request->prenom;

        $fournisseur->email = $request->email;


        // Enregistrement dans la base de données
        $fournisseur->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'fournisseur insérée avec succès'], 201);
    }





    public function getfournisseur(){
        $fournisseur = Fournisseur::all();
        return response()->json($fournisseur, 200);


    }






    public function updatefournisseur(Request $request,$id){
        $fournisseur = Fournisseur::find($id);

        if (!$fournisseur) {
             return response()->json(['Message => Fournisseur inexistant'],404);
        }

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string'

        ]);



        $fournisseur->nom = $request->nom ?? $fournisseur->nom;
        $fournisseur->prenom = $request->prenom ?? $fournisseur->prenom;
        $fournisseur->email = $request->email ?? $fournisseur->email;


        $fournisseur->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'fournisseur modifiée avec succès'], 200);
    }




    public function findByName($nom)
    {
        $fournisseur = Fournisseur::where('nom', $nom)->first();
        if (!$fournisseur) {
            return response()->json(['Message => fournisseur inexistant'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Data" => $fournisseur,
        ], 200);
    }




    public function supprimer(Request $request,$id){
        $fournisseur = Fournisseur::find($id);

        if (!$fournisseur) {
            return response()->json(['Message => fournisseur inexistante'],404);
       }
       $fournisseur->delete();
       return response()->json(['message' => 'fournisseur supprimée avec succès'], 200);
    }

}
