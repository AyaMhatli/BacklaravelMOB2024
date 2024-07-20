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
      $coun = Queue::whereDate('created_at', $today)->where('called', 1)->count();
   
       // Retourner le nombre de files d'attente au format JSON
       return response()->json(['count' => $coun]);
   }
    public function AppelNONTraites()
{
   
      
       $today = Carbon::now();
     //  \Log::info('Today: ' . $today->toDateString());

   $count = Queue::whereDate('created_at', $today)->where('called', 0)->count();
  // \Log::info('Queues: ' . $queues->count());
 
   return response()->json(['count' => $count]);
}
public function traiterQueue()
{    
    // Retrieve the current date
    $currentDate = Carbon::now()->toDateString();

    // Retrieve the oldest unprocessed queue item created today
    $queueItem = Queue::whereDate('created_at', $currentDate)
                       ->where('called', 0)
                       ->orderBy('created_at', 'asc')
                       ->first();

    if ($queueItem) {
        // Mark this item as processed
        $queueItem->called = 1;
        $queueItem->save();

        // Retrieve the next unprocessed queue item
      /*  $nextQueueItem = Queue::whereDate('created_at', $currentDate)
                              ->where('called', 0)
                              ->orderBy('created_at', 'asc')
                              ->first();*/

        return response()->json(['message' => 'Queue item processed', /*'next_queue_item' => $nextQueueItem*/]);
    }

    return response()->json(['message' => 'No queue items to process'], 200);
}

}

  /* 
  
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
    }*/




