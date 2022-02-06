<?php

namespace Tests\Feature\Games;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateGame extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_game()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_is_in_the_game_they_create()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
