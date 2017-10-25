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

        $this->thread = make('App\Thread');
    }

    public function test_an_unauthenticated_user_cannot_publish_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads', $this->thread->toArray());
    }

    public function test_an_unauth_user_cannot_see_create_thread_pages()
    {
        $this->withExceptionHandling()
            ->get('/threads/create')
            ->assertRedirect('/login');
    }

    public function test_an_authenticated_user_can_create_threads()
    {
        $this->signIn();

        $this->post('/threads', $this->thread->toArray());

        $this->get($this->thread->path())
        	->assertSee($this->thread->title);
    }
}
