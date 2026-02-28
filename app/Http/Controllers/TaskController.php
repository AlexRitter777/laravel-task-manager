<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, TaskService $taskService)
    {
        $term = $request->input('q');
        $status = $request->input('s');
        $user = $request->user();

        if($term || $status) {
            $tasks = $taskService->searchTasks($user, $term, $status, 10);
        }else {
            $tasks = $taskService->getPaginatedTasks($user,10);
        }

        return view('tasks.index', ['tasks' => $tasks, 'term' => $term, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
