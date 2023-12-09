<?php

use App\Models\Contact;

it('can be created', function () {
    $contact = Contact::factory()->create();

    expect($contact)->toBeInstanceOf(Contact::class);
});

it('can get isAdmin', function () {
    $contact = Contact::factory()->create(['role' => 'admin']);

    expect($contact->isAdmin())->toBeTrue();
});

it('can get isStaff', function () {
    $contact = Contact::factory()->create(['role' => 'staff']);

    expect($contact->isStaff())->toBeTrue();
});
