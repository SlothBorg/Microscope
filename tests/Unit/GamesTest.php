<?php

namespace Tests\Unit;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GamesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function games_creator_is_in_the_game()
    {
        $creator = User::factory()->create();
        $game = Game::factory()->create([
            'creator_id' => $creator->id,
        ]);

        $this->assertTrue($game->hasUser($creator));
    }

    /** @test */
    public function games_can_have_a_user()
    {
        $user = User::factory()->create();
        $game = Game::factory()->create();
        $creator = User::find($game->creator_id)->first();

        $game->addUser($user);

        $this->assertTrue($game->hasUser($creator));
        $this->assertTrue($game->fresh()->hasUser($user));
    }

    /** @test */
    public function games_can_have_multiple_users()
    {
        $game = Game::factory()->create();
        $users = User::factory()->count(3)->create();

        $users->each(function($user) use ($game) {
            $game->addUser($user);
            $this->assertTrue($game->hasUser($user));
        });
    }

    /** @test */
    public function can_get_all_users_from_a_game()
    {
        $game = Game::factory()->create();
        $users = User::factory()->count(5)->create();

        $users->each(function($user) use ($game) {
            $game->addUser($user);
            $this->assertTrue($game->hasUser($user));
        });

        $this->assertCount(5, $game->users()->get());
    }

    /** @test */
    public function can_get_the_creator_of_a_game()
    {
        $game = Game::factory()->create();
        $users = User::factory()->count(5)->create();

        $users->each(function($user) use ($game) {
            $game->addUser($user);
        });

        $this->assertEquals(
            User::find($game->creator_id)->first(),
            $game->creator()
        );
    }

    /** @test */
    public function can_verify_that_a_user_is_the_creator_of_a_game()
    {
        $game = Game::factory()->create();
        $users = User::factory()->count(5)->create();
        $users->each(function($user) use ($game) {
            $game->addUser($user);
        });

        $this->assertFalse($game->isCreator($users->first()));
        $this->assertTrue($game->isCreator($game->creator()));
    }
}
