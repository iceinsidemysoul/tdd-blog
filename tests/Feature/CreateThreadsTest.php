<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->make();
    }

    public function test_an_unauthenticated_user_cannot_publish_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads', $this->thread->toArray());
    }

    public function test_an_authenticated_user_can_create_threads()
    {
        // when we have a signed in user
        $this->actingAs($user = factory('App\User')->create());

        // when we hit the endpoint to create a new thread
        // $thread = factory('App\Thread')->make();
        $this->post('/threads', $this->thread->toArray());

        // then when we visited this thread page
        $this->get($this->thread->path())
        // we should see the the new thread
        	->assertSee($this->thread->title);


    }
}
