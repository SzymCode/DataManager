<?php


beforeEach(function () {
    $this->createUsers();
    $this->actingAs($this->user);
});

describe('405 > UnAuth', function () {
    /**
     * UNAUTHORIZED TESTS
     */
    test('unauthorized invalid method put on index api', function () {
        $this->put(route('users.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method put json on index api', function () {
        $this->putJson(route('users.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method delete on index api', function () {
        $this->delete(route('users.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method delete json on index api', function () {
        $this->deleteJson(route('users.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post json on show api', function () {
        $this->postJson(route('users.show', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method put json on post api', function () {
        $this->putJson(route('users.store', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method delete json on post api', function () {
        $this->deleteJson(route('users.store', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post json on update api', function () {
        $this->postJson(route('users.update', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post on delete api', function () {
        $this->post(route('users.destroy', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post json on delete api', function () {
        $this->postJson(route('users.destroy', 1))
            ->assertStatus(405);
    });
});
