<?php


namespace Tests\Unit;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_the_games_a_user_is_in()
    {
        $user = User::factory()->create();
        $games = Game::factory()->count(5)->create();

        $this->assertCount(0, $user->games()->get());

        $games->each(function ($game) use ($user) {
           $game->addUser($user);
        });

        $this->assertCount(5, $user->games()->get());
    }

    /** @test */
    public function can_get_the_games_a_user_created()
    {
        $user = User::factory()->create();
        $this->assertCount(0, $user->games()->get());

        Game::factory()->create([
            'creator_id' => $user->id,
        ]);

        $this->assertCount(1, $user->createdGames()->get());
    }
}