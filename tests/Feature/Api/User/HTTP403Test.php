<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    Sanctum::actingAs(
        User::factory()->create(),
        ['']
    );
});


describe('403', function () {
    test('unauthorized token index api', function () {
        $this->getJson(route('users.index'))
            ->assertStatus(403);
    });
    test('unauthorized token show api', function () {
        $this->getJson(route('users.show', 1))
            ->assertStatus(403);
    });
    test('unauthorized token store api', function () {
        $this->postJson(route('users.store'), data)
            ->assertStatus(403);
    });
    test('unauthorized token update api', function () {
        $user = User::factory()->create();

        $this->putJson(route('users.update', $user->id), data)
            ->assertStatus(403);
    });
    test('unauthorized token store api empty json', function () {
        $this->postJson(route('users.store'))
            ->assertStatus(403);
    });
    test('unauthorized token update api empty json', function () {
        $user = User::factory()->create();

        $this->putJson(route('users.update', $user->id))
            ->assertStatus(403);
    });
    test('unauthorized token destroy api', function () {
        $user = User::factory()->create();

        $this->deleteJson(route('users.destroy', $user->id))
            ->assertStatus(403);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    });
});
