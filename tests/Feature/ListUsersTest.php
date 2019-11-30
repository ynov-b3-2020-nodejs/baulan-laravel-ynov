<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testItHasUser()
    {
        factory(\App\User::class)->make([
            'name' => 'louise',
            'mail' => "louise.baulan@gmail.com",
        ]);

        $res = $this->getJson('/users');

        $res->assertExactJson([
            'users' => []
        ]);
    }
}
