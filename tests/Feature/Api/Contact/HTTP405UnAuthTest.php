<?php


describe('405 > UnAuth', function () {
    /**
     * UNAUTHORIZED TESTS
     */
    test('unauthorized invalid method put on index api', function () {
        $this->put(route('contacts.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method put json on index api', function () {
        $this->putJson(route('contacts.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method delete on index api', function () {
        $this->delete(route('contacts.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method delete json on index api', function () {
        $this->deleteJson(route('contacts.index', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post json on show api', function () {
        $this->postJson(route('contacts.show', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method put json on post api', function () {
        $this->putJson(route('contacts.store', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method delete json on post api', function () {
        $this->deleteJson(route('contacts.store', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post json on update api', function () {
        $this->postJson(route('contacts.update', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post on delete api', function () {
        $this->post(route('contacts.destroy', 1))
            ->assertStatus(405);
    });
    test('unauthorized invalid method post json on delete api', function () {
        $this->postJson(route('contacts.destroy', 1))
            ->assertStatus(405);
    });
});
