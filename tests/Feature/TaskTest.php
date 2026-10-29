<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_creating_a_task_refreshes_the_list_without_clearing_other_cache(): void
    {
        $this->get('/')->assertOk();
        Cache::put('unrelated', 'keep');

        $this->post('/task', ['name' => 'Buy milk'])->assertRedirect('/');
        $this->assertDatabaseHas('tasks', ['name' => 'Buy milk']);
        $this->get('/')->assertSee('Buy milk');
        $this->assertSame('keep', Cache::get('unrelated'));
    }

    public function test_deleting_a_task_refreshes_the_list_without_clearing_other_cache(): void
    {
        $task = new Task;
        $task->name = 'Remove me';
        $task->save();
        $this->get('/')->assertSee('Remove me');
        Cache::put('unrelated', 'keep');

        $this->delete('/task/'.$task->id)->assertRedirect('/');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
        $this->get('/')->assertDontSee('Remove me');
        $this->assertSame('keep', Cache::get('unrelated'));
    }

    public function test_task_name_is_required(): void
    {
        $this->post('/task', ['name' => ''])->assertSessionHasErrors('name');
        $this->assertDatabaseCount('tasks', 0);
    }
}
