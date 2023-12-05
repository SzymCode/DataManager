<?php


use App\Models\User;
use Laravel\Sanctum\Sanctum;


describe('302', function () {
    /**
     * AUTHORIZED TESTS
     */
    test('authorized invalid method put on show api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-update']
        );
        $this->put(route('contacts.show', 1))
            ->assertStatus(302);
    });
    test('authorized invalid method put on update api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-update']
        );
        $this->put(route('contacts.update', 1))
            ->assertStatus(302);
    });
    test('authorized invalid method put on delete api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-update']
        );
        $this->put(route('contacts.destroy', 1))
            ->assertStatus(302);
    });



    /**
     * UNAUTHORIZED TESTS
     */
    test('unauthorized invalid method put on show api', function () {
        $this->put(route('contacts.show', 1))
            ->assertStatus(302);
    });
    test('unauthorized invalid method put on update api', function () {
        $this->put(route('contacts.update', 1))
            ->assertStatus(302);
    });
    test('unauthorized invalid method put on delete api', function () {
        $this->put(route('contacts.destroy', 1))
            ->assertStatus(302);
    });
});
