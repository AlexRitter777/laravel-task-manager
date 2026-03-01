<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $term = $request->input('q');
        $status = $request->input('s');
        $user = $request->user();

        if($term || $status) {
            $tasks = $this->taskService->searchTasks($user, $term, $status, 10);
        }else {
            $tasks = $this->taskService->getPaginatedTasks($user,10);
        }

        return view('tasks.index', ['tasks' => $tasks, 'term' => $term, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.form');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        $task = $this->taskService->createTask($request->validated(), $request->user());

        return redirect()->route('tasks.edit', ['task' => $task])
            ->with('success', 'Task created successfully');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $task = $this->taskService->getUserOwnedTasks($id, request()->user());

        return view('tasks.form', ['task' => $task]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, int $id)
    {
        $task = $this->taskService->updateTask($id,  $request->validated(), $request->user());

        return redirect()->route('tasks.edit', ['task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->taskService->deleteTask($id, request()->user());
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
