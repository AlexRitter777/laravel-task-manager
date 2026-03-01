<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use App\Services\Search\FilterSearchService;
use App\Services\Search\LikeSearchFilter;
use App\Services\Search\WhereFilter;
use Illuminate\Pagination\LengthAwarePaginator;

final class TaskService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private FilterSearchService $searchService,
    )
    {
        //
    }


    public function getPaginatedTasks(User $user, int $perPage = 10) : LengthAwarePaginator
    {
        return $user->tasks()
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function createTask(array $data, User $user): Task
    {
       return $user->tasks()->create($data);
    }

    public function getUserOwnedTasks(int $id, User $user): Task
    {
        return $user->tasks()->findOrFail($id);
    }

    public function updateTask(int $id, array $data, User $user): Task
    {
        $task = $user->tasks()
            ->findOrFail($id);

        $task->update($data);

        return $task;
    }

    public function deleteTask(int $id, User $user): void
    {
        $user->tasks()->findOrFail($id)->delete();
    }

    public function searchTasks(User $user, ?string $term, ?string $status, int $perPage = 10) : LengthAwarePaginator
    {

        $filters = [
            new LikeSearchFilter(
                value: $term,
                column: 'tasks.title',
            ),
            new WhereFilter(
                value: $status,
                column: 'tasks.status',
            )
        ];

        $query = Task::whereBelongsTo($user);

        return $this->searchService->apply($query, $filters)
            ->orderByDesc('created_at')
            ->paginate($perPage);

    }

}
