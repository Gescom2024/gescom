<?php

namespace App\Http\Controllers;

use App\Models\Collaborateurs;

use Illuminate\Http\Request;

class collaborateurController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'civilite' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'ref_service' => 'required|string',
            'fonction' => 'required|string',
            'adresse' => 'required|string',
            'complement' => 'required|string',
            'code_postal' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'portable' => 'required|string',
            'societe_id' => 'required|numeric|exists:societes,id',
            'service_id' => 'required|numeric|exists:services,id',
        ]);

        //insertion
        $collaborateurs = new Collaborateurs;
        $collaborateurs->civilite = $request->civilite;
        $collaborateurs->nom = $request->nom;
        $collaborateurs->prenom = $request->prenom;
        $collaborateurs->ref_service = $request->ref_service;
        $collaborateurs->fonction = $request->fonction;
        $collaborateurs->adresse = $request->adresse;
        $collaborateurs->complement = $request->complement;
        $collaborateurs->code_postal = $request->code_postal;
        $collaborateurs->region = $request->region;
        $collaborateurs->ville = $request->ville;
        $collaborateurs->pays = $request->pays;
        $collaborateurs->telephone = $request->telephone;
        $collaborateurs->portable = $request->portable;
        $collaborateurs->societe_id = $request->societe_id;
        $collaborateurs->service_id = $request->service_id;


        // Enregistrement dans la base de données
        $collaborateurs->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'collaborateurs insérée avec succès'], 201);
    }





    public function getcollaborateurs()
    {
        $collaborateurs = Collaborateurs::all();
        return response()->json($collaborateurs, 200);
    }






    public function updatecollaborateurs(Request $request, $id)
    {
        $collaborateurs = Collaborateurs::find($id);

        if (!$collaborateurs) {
            return response()->json(['Message => collaborateurs inexistante'], 404);
        }

        // Validation des données
        $request->validate([
            'civilite' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'ref_service' => 'required|string',
            'fonction' => 'required|string',
            'adresse' => 'required|string',
            'complement' => 'required|string',
            'code_postal' => 'required|string',
            'region' => 'required|string',
            'ville' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required|string',
            'portable' => 'required|string',
            'societe_id' => 'required|numeric|exists:societes,id',
            'service_id' => 'required|numeric|exists:services,id',
        ]);

        //insertion
        $collaborateurs->civilite = $request->civilite;
        $collaborateurs->nom = $request->nom;
        $collaborateurs->prenom = $request->prenom;
        $collaborateurs->ref_service = $request->ref_service;
        $collaborateurs->fonction = $request->fonction;
        $collaborateurs->adresse = $request->adresse;
        $collaborateurs->complement = $request->complement;
        $collaborateurs->code_postal = $request->code_postal;
        $collaborateurs->region = $request->region;
        $collaborateurs->ville = $request->ville;
        $collaborateurs->pays = $request->pays;
        $collaborateurs->telephone = $request->telephone;
        $collaborateurs->portable = $request->portable;
        $collaborateurs->societe_id = $request->societe_id;
        $collaborateurs->service_id = $request->service_id;

        $collaborateurs->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'collaborateurs modifiée avec succès'], 200);
    }





    public function findByid(Request $request, $id)
    {
        $collaborateur = Collaborateurs::find($id);

        if (!$collaborateur) {
            return response()->json(['Message => collaborateurs inexistante'], 404);
        }
        return response()->json([
            "statut" => "success",
            "Données" => $collaborateur,
        ], 200);
    }





    public function findByName($nom)
    {
        $collaborateur = Collaborateurs::where('nom', $nom)->first();

        if (!$collaborateur) {
            return response()->json(['message' => 'Collaborateur inexistant'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $collaborateur,
        ], 200);
    }




    public function supprimer(Request $request, $id)
    {
        $collaborateurs = Collaborateurs::find($id);

        if (!$collaborateurs) {
            return response()->json(['Message => collaborateurs inexistante'], 404);
        }
        $collaborateurs->delete();
        return response()->json(['message' => 'collaborateurs supprimée avec succès'], 200);
    }
}
