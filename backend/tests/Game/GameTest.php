<?php

use App\Models\Game;
use App\Models\User;

use function Pest\Laravel\actingAs;

uses()->group('game');

beforeEach(function () {
    $user = User::factory()->create();
    actingAs($user);
});

describe('index route', function () {
    it('can fetch all games', function () {
        $games = Game::factory()->count(50)->create();

        $response = $this->get('games');

        $response->assertStatus(200)->assertJson($games->toArray());
    });
});

describe('show route', function () {
    it('can fetch a game', function () {
        $game = Game::factory()->create();

        $response = $this->get("games/$game->id");

        $response->assertStatus(200)->assertJson($game->toArray());
    });

    it('returns a 404 for trying to show a nonexistent game', function () {

        $response = $this->get('games/1');

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

        $response = $this->post('games', $data);

        $response->assertStatus(201)->assertJson($data);
    });
});

describe('update route', function () {
    it('can update a game', function () {
        $game = Game::factory()->create();

        $updatedData = [
            'name' => 'Updated Game Name',
            'release_date' => '2023-02-01',
            'developer' => 'Updated Developer',
            'description' => 'Updated game description.',
        ];

        $response = $this->put("games/$game->id", $updatedData);

        $response->assertStatus(200)->assertJson($updatedData);
    });

    it('returns a 404 for trying to update a nonexistent game', function () {
        $updatedData = [
            'name' => 'Updated Game Name',
            'release_date' => '2023-02-01',
            'developer' => 'Updated Developer',
            'description' => 'Updated game description.',
        ];

        $response = $this->put('games/1', $updatedData);

        $response->assertStatus(404);
    });
});

describe('delete route', function () {
    it('can delete a game', function () {
        $game = Game::factory()->create();

        $response = $this->delete("/games/$game->id");

        $response->assertStatus(200);
        $this->assertSoftDeleted('games', ['id' => $game->id]);
    });

    it('returns a 404 for trying to delete a nonexistent game', function () {
        $response = $this->delete('/games/1');

        $response->assertStatus(404);
    });
});
