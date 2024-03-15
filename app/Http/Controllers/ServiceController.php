<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\Http\Request;

class serviceController extends Controller
{

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',

        ]);
  // $service->created_at = $request->created_at;
        // $service->updated_at = $request->updated_at;
        // Création de la société
        $service = new Service;
        $service->nom = $request->nom;

        // Enregistrement dans la base de données
        $service->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'service insérée avec succès'], 201);
    }





    public function getservice(){
        $service = Service::all();
        return response()->json($service, 200);


    }






    public function updateservice(Request $request,$id){
        $service = Service::find($id);

        if (!$service) {
             return response()->json(['Message => Service inexistante'],404);
        }

        $request->validate([
            'nom' => 'required|string',
        ]);



        $service->nom = $request->nom ?? $service->nom;

        $service->save();

        // Retourner une réponse appropriée
        return response()->json(['message' => 'service modifiée avec succès'], 200);
    }








    public function supprimer(Request $request,$id){
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['Message => Service inexistante'],404);
       }
       $service->delete();
       return response()->json(['message' => 'Service supprimée avec succès'], 200);
    }

}
