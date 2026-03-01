<?php

use App\Models\Task;
use App\Models\User;
use App\Services\Search\FilterSearchService;
use App\Services\Search\LikeSearchFilter;
use App\Services\Search\WhereFilter;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

it('applies like search filter', function ()  {

    $user = User::factory()->create();

    Task::factory()->for($user)->create([
        'title' => 'My Favorite Task',
    ]);

    Task::factory()->for($user)->create([
        'title' => 'Just task'
    ]);

    $query = Task::query()->where('user_id', $user->id);

    $filter = new LikeSearchFilter('favorite', 'title');

    $filterService = new FilterSearchService();

    $result = $filterService->apply($query, [$filter])->get();

    expect($result)->toHaveCount(1)
        ->and($result->first()->title)->toBe('My Favorite Task');

});

it('applies where search filter', function ()  {

    $user = User::factory()->create();

    Task::factory()->for($user)->create([
        'title' => 'My Favorite Task',
        'status' => App\Enums\TaskStatus::DOING
    ]);

    Task::factory()->for($user)->create([
        'title' => 'Just task',
        'status' =>  App\Enums\TaskStatus::DONE
    ]);

    $query = Task::query()->where('user_id', $user->id);

    $filter = new WhereFilter('doing', 'status');

    $filterService = new FilterSearchService();

    $result = $filterService->apply($query, [$filter])->get();

    expect($result)->toHaveCount(1)
        ->and($result->first()->status)->toBe(App\Enums\TaskStatus::DOING);

});

it('applies like and where search filter', function ()  {

    $user = User::factory()->create();

    Task::factory()->for($user)->create([
        'title' => 'My Favorite Task',
        'status' => App\Enums\TaskStatus::DOING
    ]);

    Task::factory()->for($user)->create([
        'title' => 'Just task',
        'status' =>  App\Enums\TaskStatus::DONE
    ]);

    $query = Task::query()->where('user_id', $user->id);

    $filters = [
        new LikeSearchFilter('favorite', 'title'),
        new WhereFilter('doing', 'status'),
    ];

    $filterService = new FilterSearchService();

    $result = $filterService->apply($query, $filters)->get();

    expect($result)->toHaveCount(1)
        ->and($result->first()->status)->toBe(App\Enums\TaskStatus::DOING);

});
