<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Call;
use Illuminate\Support\Carbon;


class CallController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   /* public function getName()
    {
        return response()->json(['name' => 'Salim']);
    }*/

    public function NumeroActuelle()
    {
       /* $calls = Call::all();
        return response()->json($calls);*/
        $today = Carbon::today();
        // $count = Queue::where('called', 0)->count();
        $count = Call::whereDate('created_at', $today)->count();
       // Retourner le nombre de files d'attente au format JSON
         return response()->json(['count' => $count]);
    }

  /*  public function show($id)
    {
        $call = Call::find($id);
        return response()->json($call);
    } 

    public function store(Request $request)
    {
        // Ajoutez ici la logique pour valider et enregistrer les données du nouvel appel
        $call = Call::create($request->all());
        return response()->json($call, 201);
    }

    public function update(Request $request, $id)
    {
        $call = Call::findOrFail($id);
        // Ajoutez ici la logique pour valider et mettre à jour les données de l'appel
        $call->update($request->all());
        return response()->json($call, 200);
    }

    public function destroy($id)
    {
        $call = Call::findOrFail($id);
        $call->delete();
        return response()->json(null, 204);
    }*/
}
