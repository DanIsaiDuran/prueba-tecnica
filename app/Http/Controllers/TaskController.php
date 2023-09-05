<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    
    public function store(TaskRequest $request){

        // Max 5 uncompleted taks validation
        $user = User::find($request->user_id);
        if($user->tasks->where('is_completed', false)->count() >= 5){
            return response()->json([
                'error'   => 'Ha excedido el limite de tareas sin completar por usuario',
            ]);
        }
        
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->company_id = $request->company_id;
        $task->save();

        return response()->json($task->load('company'));
    }
}
