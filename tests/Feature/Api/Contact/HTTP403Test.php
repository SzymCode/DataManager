<?php

use App\Models\User;
use App\Models\Contact;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    Sanctum::actingAs(
        User::factory()->create(),
        ['']
    );
});


describe('403', function () {
    test('unauthorized token index api', function () {
        $this->getJson(route('contacts.index'))
            ->assertStatus(403);
    });
    test('unauthorized token show api', function () {
        $this->getJson(route('contacts.show', 1))
            ->assertStatus(403);
    });
    test('unauthorized token store api', function () {
        $this->postJson(route('contacts.store'), data)
            ->assertStatus(403);
    });
    test('unauthorized token update api', function () {
        $contact = Contact::factory()->create();

        $this->putJson(route('contacts.update', $contact->id), data)
            ->assertStatus(403);
    });
    test('unauthorized token store api empty json', function () {
        $this->postJson(route('contacts.store'))
            ->assertStatus(403);
    });
    test('unauthorized token update api empty json', function () {
        $contact = Contact::factory()->create();

        $this->putJson(route('contacts.update', $contact->id))
            ->assertStatus(403);
    });
    test('unauthorized token destroy api', function () {
        $contact = Contact::factory()->create();

        $this->delete(route('contacts.destroy', $contact->id))
            ->assertStatus(403);
        $this->assertDatabaseHas('contacts', ['id' => $contact->id]);
    });
});
