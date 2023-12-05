<?php

use App\Models\Contact;


describe('401', function() {
    test('unauthorized index api', function () {
        $this->getJson(route('contacts.index'))
            ->assertStatus(401);
    });
    test('unauthorized show api', function () {
        $contact = Contact::factory()->create();

        $this->getJson(route('contacts.show',  $contact->id))
            ->assertStatus(401);
    });
    test('unauthorized store api with data', function () {

        $this->postJson(route('contacts.store'), data)
            ->assertStatus(401);
    });
    test('unauthorized store api empty json', function () {
        $this->postJson(route('contacts.store'))
            ->assertStatus(401);
    });
    test('unauthorized update api with data', function () {
        $contact = Contact::factory()->create();

        $this->putJson(route('contacts.update', $contact->id), data)
            ->assertStatus(401);
    });
    test('unauthorized update api empty json', function () {
        $contact = Contact::factory()->create();

        $this->putJson(route('contacts.update', $contact->id))
            ->assertStatus(401);
    });
    test('unauthorized destroy api', function () {
        $contact = Contact::factory()->create();

        $this->delete(route('contacts.destroy', $contact->id))
            ->assertStatus(302);
        $this->assertDatabaseHas('contacts', ['id' => $contact->id]);
    });
});
