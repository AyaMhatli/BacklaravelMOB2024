<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Queue;


class QueueController extends Controller
{
    
 /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function AppelTraites()
   { 
       $today = Carbon::today();
      
      // $count = Queue::where('called', 0)->count();
      $coun = Queue::whereDate('created_at', $today)->where('called', 0)->count();
   
       // Retourner le nombre de files d'attente au format JSON
       return response()->json(['count' => $coun-1]);
   }
    public function AppelNONTraites()
{
   
        /* Récupérer toutes les files d'attente avec called égal à 0
        $queues = Queue::where('called', 0)->get();
        
        // Retourner les files d'attente au format JSON
       return response()->json($queues);
       //return queues;*/
       $today = Carbon::today();
   // $count = Queue::where('called', 0)->count();
   $count = Queue::whereDate('created_at', $today)->where('called', 0)->count();
  // Retourner le nombre de files d'attente au format JSON
    return response()->json(['count' => $count]);
}
   public function index()
   {

   }
  
    public function show(Queue $queue)
    {
        // Retourner une ressource pour une file d'attente spécifique
        return new QueueResource($queue);
    }

    public function store(QueueRequest $request)
    {
        // Créer une nouvelle file d'attente
        $queue = Queue::create($request->all());

        // Retourner la ressource de la file d'attente nouvellement créée
        return new QueueResource($queue);
    }

    public function update(QueueRequest $request, Queue $queue)
    {
        // Mettre à jour la file d'attente
        $queue->update($request->all());

        // Retourner la ressource mise à jour de la file d'attente
        return new QueueResource($queue);
    }

    public function destroy(Queue $queue)
    {
        // Supprimer la file d'attente
        $queue->delete();

        // Retourner une réponse JSON
        return response()->json(null, 204);
    }
}
