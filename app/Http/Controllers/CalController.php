<?php
 
namespace App\Http\Controllers;
use App\Models\Call;
use Illuminate\Http\Request;

class CalController extends Controller
{
    public function index()
    {
        $calls = Call::all();
        return view('calls.index', compact('calls'));
    }

    public function show($id)
    {
        $call = Call::find($id);
        return view('calls.show', compact('call'));
    }

    public function store(Request $request)
    {
        $call = new Call();
        // Ajoutez ici la logique pour valider et enregistrer les données du nouvel appel
        $call->save();
        return redirect()->back()->with('success', 'Appel ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $call = Call::find($id);
        // Ajoutez ici la logique pour valider et mettre à jour les données de l'appel
        $call->save();
        return redirect()->back()->with('success', 'Appel mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $call = Call::find($id);
        $call->delete();
        return redirect()->back()->with('success', 'Appel supprimé avec succès.');
    }
}
