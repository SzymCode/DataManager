<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function() {
    Sanctum::actingAs(
        User::factory()->create(),
        ['users-store']
    );
});


describe('422 > POST', function() {
    /**
     * NAME TESTS
     */
    $userData['name'] = '';
    test('validation error no name', validateUserPostData(
        $userData,
        422,
        ['errors' => ['name']],
        ['name' => 'The name field is required.']
    ));

    $userData['name'] = [];
    test('validation error invalid name array', validateUserPostData(
        $userData,
        422,
        ['errors' => ['name']],
        ['name' => 'The name field is required.']
    ));

    $userData['name'] = false;
    test('validation error invalid name false', validateUserPostData(
        $userData,
        422,
        ['errors' => ['name']],
        ['name' => 'The name field must be a string.']
    ));

    $userData['name'] = true;
    test('validation error invalid name true', validateUserPostData(
        $userData,
        422,
        ['errors' => ['name']],
        ['name' => 'The name field must be a string.']
    ));
    $userData['name'] = userData['name']; // reset name value



    /**
     * EMAIL TESTS
     */
    $userData['email'] = 'admin.example.com';
    test('validation error wrong email format', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $userData['email'] = [];
    test('validation error email array', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field is required.']
    ));

    $userData['email'] = 1;
    test('validation error email integer', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $userData['email'] = false;
    test('validation error email false', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $userData['email'] = true;
    test('validation error email true', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $userData['email'] = '@a';
    test('validation error email too short', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $userData['email'] = 'loremipsumdolorsitametconsecteturadipiscingelitseddoetaliqualaborum@exampleemail.com';
    test('validation error email too long', validateUserPostData(
        $userData,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must not be greater than 70 characters.']
    ));
    $userData['email'] = userData['email']; // reset email value



    /**
     * PASSWORD TESTS
     */
    $userData['password'] = '';
    test('validation error no password', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field is required.']
    ));

    $userData['password'] = [];
    test('validation error password array', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field is required.']
    ));

    $userData['password'] = 1;
    test('validation error password integer', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field must be at least 8 characters.']
    ));

    $userData['password'] = false;
    test('validation error password false', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field must be at least 8 characters.']
    ));

    $userData['password'] = true;
    test('validation error password true', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field must be at least 8 characters.']
    ));

    $userData['password'] = 'L';
    test('validation error password too short', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field must be at least 8 characters.']
    ));

    $userData['password'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do et aliqua laborum.';
    test('validation error password too long', validateUserPostData(
        $userData,
        422,
        ['errors' => ['password']],
        ['password' => 'The password field must not be greater than 50 characters.']
    ));
    $userData['password'] = userData['password']; // reset password value



    /**
     * ROLE TESTS
     */
    $userData['role'] = [];
    test('validation error role array', validateUserPostData(
        $userData,
        422,
        ['errors' => ['role']],
        ['role' => 'The role field is required.']
    ));

    $userData['role'] = 1;
    test('validation error role integer', validateUserPostData(
        $userData,
        422,
        ['errors' => ['role']],
        ['role' => [
            "The role field must be a string.",
            "The selected role is invalid."
        ]]
    ));

    $userData['role'] = 'invalid';
    test('validation error role invalid', validateUserPostData(
        $userData,
        422,
        ['errors' => ['role']],
        ['role' => [
            "The role field must be a string.",
            "The selected role is invalid."
        ]]
    ));
});
