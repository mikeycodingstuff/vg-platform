<?php

use App\Models\Game;

uses()->group('game');

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

describe('store route', function () {
    it('can create a new game', function () {
        $data = [
            'name' => 'New Game',
            'release_date' => '2023-01-01',
            'developer' => 'New Developer',
            'description' => 'A new game description.',
        ];
    
        $response = $this->post('/games', $data);
    
        $response->assertStatus(201)->assertJson($data);
    });
});
