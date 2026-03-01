<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

pest()->use(RefreshDatabase::class);


it('can create a task acting like authenticated user', function () {

    $user = User::factory()->create();

    actingAs($user)
        ->post(route('tasks.store'), [
            'title' => 'Test Task',
            'description' => 'Test Task Description',
            'deadline_at' => now()->addDay()->format('Y-m-d'),
    ]);

    expect(Task::where('title', 'Test Task')->exists())->toBeTrue();

});

it('can not update a task created by another authenticated user', function () {

    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $user1Task = Task::factory()->for($user1)->create([
        'title' => 'Test Task',
        'description' => 'Test Task Description',
        'deadline_at' => now()->addDay()->format('Y-m-d'),
    ]);

    actingAs($user2)->put(route('tasks.update', $user1Task->id), [
        'title' => 'Changed Test Task',
        'description' => 'Changed Test Task Description',
        'deadline_at' => now()->addMonth()->format('Y-m-d'),
    ])->assertStatus(404);



    expect($user1Task->title)->toBe('Test Task');

});

