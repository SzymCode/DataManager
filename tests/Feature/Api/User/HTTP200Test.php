<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;


describe('200', function () {
    test('authorized store api', function () {
        $this->artisan('migrate:fresh');

        Sanctum::actingAs(
            User::factory()->create(),
            ['users-store']
        );

        $this->postJson(route('users.store'), userData)
            ->assertOk();
    });

    test('authorized index api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['users-index']
        );

        $this->getJson(route('users.index'))
            ->assertOk();
    });

    test('authorized show api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['users-show']
        );

        $this->getJson(route('users.show', 1))
            ->assertOk();
    });

    test('authorized update api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['users-update']
        );

        $user = User::factory()->create();

        $this->putJson(route('users.update', $user->id), updatedUserData)
            ->assertOk();
    });

    test('authorized destroy api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['users-destroy']
        );

        $user = User::factory()->create();

        $this->deleteJson(route('users.destroy', $user->id))
            ->assertOk();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    });
});
