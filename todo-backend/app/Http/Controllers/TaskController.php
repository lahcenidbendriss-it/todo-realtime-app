<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\TaskCreated;



class TaskController extends Controller
{
    // 🔐 Appliquer le middleware dans le constructeur
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    // 📄 Lister toutes les tâches de l'utilisateur
    public function index()
    {
        $tasks = Auth::user()->tasks;
        return response()->json($tasks);
    }

    // 🔍 Détail d'une tâche
    public function show($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        return response()->json($task);
    }

    // ➕ Créer une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $task = Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
        event(new TaskCreated($task)); // 🔔 Broadcast it
        
    
        // 🔔 Diffuser l'événement
        broadcast(new TaskCreated($task))->toOthers();
    
        return response()->json($task, 201);
    }

    // 📝 Modifier une tâche
    public function update(Request $request, $id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);

        $task->update($request->only('title', 'description', 'is_done'));

        return response()->json($task);
    }

    // ❌ Supprimer une tâche
    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
