<?php


use App\Models\User;


describe('401', function () {
    test('unauthorized index api', function () {
        $this->getJson(route('users.index'))
            ->assertStatus(401);
    });
    test('unauthorized show api', function () {
        $user = User::factory()->create();

        $this->getJson(route('users.show', $user->id))
            ->assertStatus(401);
    });
    test('unauthorized store api with data', function () {

        $this->postJson(route('users.store'), userData)
            ->assertStatus(401);
    });
    test('unauthorized store api empty json', function () {
        $this->postJson(route('users.store'))
            ->assertStatus(401);
    });
    test('unauthorized update api with data', function () {
        $user = User::factory()->create();

        $this->putJson(route('users.update', $user->id), updatedUserData)
            ->assertStatus(401);
    });
    test('unauthorized update api empty json', function () {
        $user = User::factory()->create();

        $this->putJson(route('users.update', $user->id))
            ->assertStatus(401);
    });
    test('unauthorized destroy api', function () {
        $user = User::factory()->create();

        $this->deleteJson(route('users.destroy', $user->id))
            ->assertStatus(401);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    });
});
