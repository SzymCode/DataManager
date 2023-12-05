<?php

use App\Models\User;
use App\Models\Contact;
use Laravel\Sanctum\Sanctum;

$data = require_once 'tests\TestConstants.php';
$updatedData = require_once 'tests\TestConstants.php';

describe('200', function () {
    test('authorized store api', function () {
        $this->artisan('migrate:fresh');

        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-store']
        );

        $this->postJson(route('contacts.store'), data)
            ->assertOk();
    });

    test('authorized index api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-index']
        );

        $this->getJson(route('contacts.index'))
            ->assertOk();
    });

    test('authorized show api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-show']
        );

        $this->getJson(route('contacts.show', 1))
            ->assertOk();
    });

    test('authorized update api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-update']
        );

        $contact = Contact::factory()->create();

        $this->putJson(route('contacts.update', $contact->id), updatedData)
            ->assertOk();
    });

    test('authorized destroy api', function () {
        Sanctum::actingAs(
            User::factory()->create(),
            ['contacts-destroy']
        );

        $contact = Contact::factory()->create();

        $this->delete(route('contacts.destroy', $contact->id))
            ->assertOk();
        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    });
});
