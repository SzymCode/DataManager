<?php

use App\Models\Contact;


test('factory creates record', function () {
    $contact = Contact::factory()->create();

    $this->assertDatabaseCount('contacts', 1);
    $this->assertDatabaseHas('contacts', ['id' => $contact->id]);
});

test('factory creates multiple records', function () {
    $contacts = Contact::factory()->count(3)->create();

    $this->assertDatabaseCount('contacts', 3);
    foreach ($contacts as $contact) {
        $this->assertDatabaseHas('contacts', ['id' => $contact->id]);
    }
});

test('factory creates wrong record', function () {
    try {
        Contact::factory()->create(['birthday' => 'invalid_date']);
    } catch (Exception $e) {
        $this->assertStringContainsString('Incorrect date value', $e->getMessage());
        return;
    }

    $this->fail('Expected exception not thrown.');
});

test('factory creates multiple wrong records', function () {
    try {
        Contact::factory()->count(2)->create(['birthday' => 'invalid_date']);
    } catch (Exception $e) {
        $this->assertStringContainsString('Incorrect date value', $e->getMessage());
        return;
    }

    $this->fail('Expected exception not thrown.');
});
