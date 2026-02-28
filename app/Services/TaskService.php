<?php

namespace App\Services;

use App\Models\Task;
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


    public function getPaginatedTasks(int $perPage = 10) : LengthAwarePaginator
    {
        return Task::orderByDesc('created_at')->paginate($perPage);
    }



    public function searchTasks(?string $term, ?string $status, int $perPage = 10) : LengthAwarePaginator
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

        $query = Task::query();

        return $this->searchService->apply($query, $filters)
            ->paginate($perPage);

    }

}
