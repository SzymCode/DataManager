<?php


beforeEach(function () {
    $this->createUsers();
    $this->actingAs($this->admin);
});

describe('422 > POST', function($userData = userData) {
    /**
     * NAME TESTS
     */
    $userData['name'] = '';
    test('validation error no name', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['name']],
        ['errors' => [
            'name' => ['The name field is required.']
        ]]
    ));

    $userData['name'] = [];
    test('validation error invalid name array', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['name']],
        ['errors' => [
            'name' => ['The name field is required.']
        ]]
    ));

    $userData['name'] = false;
    test('validation error invalid name false', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['name']],
        ['errors' => [
            'name' => [
                'The name field must be a string.',
                'The name field must be at least 3 characters.'
            ]
        ]]
    ));

    $userData['name'] = true;
    test('validation error invalid name true', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['name']],
        ['errors' => [
            'name' => [
                'The name field must be a string.',
                'The name field must be at least 3 characters.'
            ]
        ]]
    ));
    $userData['name'] = userData['name']; // reset name value



    /**
     * EMAIL TESTS
     */
    $userData['email'] = 'admin.example.com';
    test('validation error wrong email format', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => ['The email field must be a valid email address.']
        ]]
    ));

    $userData['email'] = [];
    test('validation error email array', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => ['The email field is required.']
        ]]
    ));

    $userData['email'] = 1;
    test('validation error email integer', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $userData['email'] = false;
    test('validation error email false', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $userData['email'] = true;
    test('validation error email true', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $userData['email'] = '@a';
    test('validation error email too short', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $userData['email'] = 'loremipsumdolorsitametconsecteturadipiscingelitseddoetaliqualaborum@exampleemail.com';
    test('validation error email too long', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => ['The email field must not be greater than 70 characters.']
        ]]
    ));
    $userData['email'] = userData['email']; // reset email value



    /**
     * PASSWORD TESTS
     */
    $userData['password'] = '';
    test('validation error no password', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field is required.']
        ]]
    ));

    $userData['password'] = [];
    test('validation error password array', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field is required.']
        ]]
    ));

    $userData['password'] = 1;
    test('validation error password integer', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field must be at least 8 characters.']
        ]]
    ));

    $userData['password'] = false;
    test('validation error password false', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field must be at least 8 characters.']
        ]]
    ));

    $userData['password'] = true;
    test('validation error password true', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field must be at least 8 characters.']
        ]]
    ));

    $userData['password'] = 'L';
    test('validation error password too short', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field must be at least 8 characters.']
        ]]
    ));

    $userData['password'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do et aliqua laborum.';
    test('validation error password too long', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['password']],
        ['errors' => [
            'password' => ['The password field must not be greater than 50 characters.']
        ]]
    ));
    $userData['password'] = userData['password']; // reset password value



    /**
     * ROLE TESTS
     */
    $userData['role'] = [];
    test('validation error role array', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['role']],
        ['errors' => [
            'role' => ['The role field is required.']
        ]]
    ));

    $userData['role'] = 1;
    test('validation error role integer', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['role']],
        ['errors' => [
            'role' => ['The selected role is invalid.']
        ]]
    ));

    $userData['role'] = 'invalid';
    test('validation error role invalid', apiTest(
        'POST',
        'users.store',
        422,
        $userData,
        ['errors' => ['role']],
        ['errors' => [
            'role' => ['The selected role is invalid.']
        ]]
    ));
});
