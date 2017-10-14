<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTests extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_see_threads()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);

    }

    public function test_a_user_can_read_a_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get("/threads/{$thread->id}");
        $response->assertSee($thread->title);
    }
}
