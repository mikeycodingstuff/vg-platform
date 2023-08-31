<?php

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('index route', function () {
    it('returns a successful response', function () {
        $response = $this->get('/games');

        $response->assertStatus(200);
    });
});

describe('show route', function () {
    it('returns a successful response', function () {
        $game = Game::factory()->create();
        $response = $this->get("/games/$game->id");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $game->id,
                'name' => $game->name,
                'release_date' => $game->release_date,
                'description' => $game->description,
                'developer' => $game->developer,
            ]);
    });

    it('returns a 404 for a nonexistent resource', function () {
        $response = $this->get('/games/1');
        $response->assertStatus(404);
    });
});
