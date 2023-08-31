<?php

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('index route', function () {
    it('can fetch all games', function () {
        $games = Game::factory()->count(50)->create();

        $response = $this->get('/games');

        $response->assertStatus(200)->assertJson($games->toArray());
    });
});

describe('show route', function () {
    it('can fetch a game', function () {
        $game = Game::factory()->create();

        $response = $this->get("/games/$game->id");

        $response->assertStatus(200)->assertJson($game->toArray());
    });

    it('returns a 404 for a nonexistent game', function () {
        $response = $this->get('/games/1');
        $response->assertStatus(404);
    });
});
