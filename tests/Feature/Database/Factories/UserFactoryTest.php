<?php

use App\Models\User;


test('factory creates record', function () {
    $user = User::factory()->create();

    $this->assertDatabaseCount('users', 1);
    $this->assertDatabaseHas('users', ['id' => $user->id]);
});

test('factory creates multiple records', function () {
    $users = User::factory()->count(3)->create();

    $this->assertDatabaseCount('users', 3);
    foreach ($users as $user) {
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
});
