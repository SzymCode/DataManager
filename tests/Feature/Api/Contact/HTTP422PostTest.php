<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function() {
    Sanctum::actingAs(
        User::factory()->create(),
        ['contacts-store']
    );
});

describe('422 > POST', function() {
    /**
     * USER ID TESTS
     */
    $data['user_id'] = '';
    test('validation error no user_id', validateContactPostData(
        $data,
        422,
        ['errors' => ['user_id']],
        ['user_id' => 'The user id field is required.']
    ));

    $data['user_id'] = [];
    test('validation error invalid user_id array', validateContactPostData(
        $data,
        422,
        ['errors' => ['user_id']],
        ['user_id' => 'The user id field is required.']
    ));

    $data['user_id'] = 'user_id';
    test('validation error invalid user_id string', validateContactPostData(
        $data,
        422,
        ['errors' => ['user_id']],
        ['user_id' => 'The user id field must be an integer.']
    ));

    $data['user_id'] = false;
    test('validation error invalid user_id false', validateContactPostData(
        $data,
        422,
        ['errors' => ['user_id']],
        ['user_id' => 'The user id field must be an integer.']
    ));
    $data['user_id'] = data['user_id']; // reset user_id value


    /**
     * FIRST NAME TESTS
     */
    $data['first_name'] = '';
    test('validation error no first_name', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field is required.']
    ));

    $data['first_name'] = [];
    test('validation error first_name array', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field is required.']
    ));

    $data['first_name'] = 1;
    test('validation error first_name integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field must be a string.']
    ));

    $data['first_name'] = false;
    test('validation error first_name false', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field must be a string.']
    ));

    $data['first_name'] = true;
    test('validation error first_name true', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field must be a string.']
    ));

    $data['first_name'] = 'L';
    test('validation error first_name too short', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field must be at least 3 characters.']
    ));

    $data['first_name'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do et aliqua laborum.';
    test('validation error first_name too long', validateContactPostData(
        $data,
        422,
        ['errors' => ['first_name']],
        ['first_name' => 'The first name field must not be greater than 30 characters.']
    ));
    $data['first_name'] = data['first_name']; // reset first_name value


    /**
     * LAST NAME TESTS
     */
    $data['last_name'] = [];
    test('validation error last_name array', validateContactPostData(
        $data,
        422,
        ['errors' => ['last_name']],
        ['last_name' => 'The last name field must be at least 3 characters.']
    ));

    $data['last_name'] = 1;
    test('validation error last_name integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['last_name']],
        ['last_name' => 'The last name field must be a string.']
    ));

    $data['last_name'] = false;
    test('validation error last_name false', validateContactPostData(
        $data,
        422,
        ['errors' => ['last_name']],
        ['last_name' => 'The last name field must be a string.']
    ));

    $data['last_name'] = true;
    test('validation error last_name true', validateContactPostData(
        $data,
        422,
        ['errors' => ['last_name']],
        ['last_name' => 'The last name field must be a string.']
    ));

    $data['last_name'] = 'L';
    test('validation error last_name too short', validateContactPostData(
        $data,
        422,
        ['errors' => ['last_name']],
        ['last_name' => 'The last name field must be at least 3 characters.']
    ));

    $data['last_name'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do et aliqua laborum.';
    test('validation error last_name too long', validateContactPostData(
        $data,
        422,
        ['errors' => ['last_name']],
        ['last_name' => 'The last name field must not be greater than 30 characters.']
    ));
    $data['last_name'] = data['last_name']; // reset last_name value



    /**
     * EMAIL TESTS
     */
    $data['email'] = 'admin.example.com';
    test('validation error wrong email format', validateContactPostData(
        $data,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $data['email'] = [];
    test('validation error email array', validateContactPostData(
        $data,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $data['email'] = 1;
    test('validation error email integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $data['email'] = false;
    test('validation error email false', validateContactPostData(
        $data,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));

    $data['email'] = true;
    test('validation error email true', validateContactPostData(
        $data,
        422,
        ['errors' => ['email']],
        ['email' => 'The email field must be a valid email address.']
    ));
    $data['email'] = data['email']; // reset email value



    /**
     * PERSONAL PHONE TESTS
     */
    $data['personal_phone'] = [];
    test('validation error personal_phone array', validateContactPostData(
        $data,
        422,
        ['errors' => ['personal_phone']],
        ['personal_phone' => [
            "The personal phone field must be a string.",
            "The personal phone field must be at least 9 characters.",
            "The personal phone field format is invalid."
        ]]
    ));

    $data['personal_phone'] = false;
    test('validation error personal_phone false', validateContactPostData(
        $data,
        422,
        ['errors' => ['personal_phone']],
        ['personal_phone' => [
            'The personal phone field must be a string.',
            'The personal phone field must be at least 9 characters.'
        ]]
    ));

    $data['personal_phone'] = true;
    test('validation error personal_phone true', validateContactPostData(
        $data,
        422,
        ['errors' => ['personal_phone']],
        ['personal_phone' => [
            'The personal phone field must be a string.',
            'The personal phone field must be at least 9 characters.'
        ]]
    ));

    $data['personal_phone'] = '9876543';
    test('validation error personal_phone too short', validateContactPostData(
        $data,
        422,
        ['errors' => ['personal_phone']],
        ['personal_phone' => 'The personal phone field must be at least 9 characters.']
    ));

    $data['personal_phone'] = '98 76 543 210 123';
    test('validation error personal_phone too long', validateContactPostData(
        $data,
        422,
        ['errors' => ['personal_phone']],
        ['personal_phone' => [
            'The personal phone field must not be greater than 9 characters.',
            'The personal phone field format is invalid.'
        ]]
    ));
    $data['personal_phone'] = data['personal_phone']; // reset personal_phone value



    /**
     * WORK PHONE TESTS
     */
    $data['work_phone'] = [];
    test('validation error work_phone array', validateContactPostData(
        $data,
        422,
        ['errors' => ['work_phone']],
        ['work_phone' => [
            "The work phone field must be a string.",
            "The work phone field must be at least 9 characters.",
            "The work phone field format is invalid."
        ]]
    ));

    $data['work_phone'] = false;
    test('validation error work_phone false', validateContactPostData(
        $data,
        422,
        ['errors' => ['work_phone']],
        ['work_phone' => [
            'The work phone field must be a string.',
            'The work phone field must be at least 9 characters.'
        ]]
    ));

    $data['work_phone'] = true;
    test('validation error work_phone true', validateContactPostData(
        $data,
        422,
        ['errors' => ['work_phone']],
        ['work_phone' => [
            'The work phone field must be a string.',
            'The work phone field must be at least 9 characters.'
        ]]
    ));

    $data['work_phone'] = '9876543';
    test('validation error work_phone too short', validateContactPostData(
        $data,
        422,
        ['errors' => ['work_phone']],
        ['work_phone' => [
            'The work phone field must be at least 9 characters.'
        ]]
    ));

    $data['work_phone'] = '98 76 543 210 123';
    test('validation error work_phone too long', validateContactPostData(
        $data,
        422,
        ['errors' => ['work_phone']],
        ['work_phone' => [
            'The work phone field must not be greater than 9 characters.',
            'The work phone field format is invalid.'
        ]]
    ));
    $data['work_phone'] = data['work_phone']; // reset work_phone value



    /**
     * ADDRESS TESTS
     */
    $data['address'] = [];
    test('validation error address array', validateContactPostData(
        $data,
        422,
        ['errors' => ['address']],
        ['address' => 'The address field must be a string.']
    ));

    $data['address'] = 1;
    test('validation error address integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['address']],
        ['address' => 'The address field must be a string.']
    ));

    $data['address'] = false;
    test('validation error address false', validateContactPostData(
        $data,
        422,
        ['errors' => ['address']],
        ['address' => 'The address field must be a string.']
    ));

    $data['address'] = true;
    test('validation error address true', validateContactPostData(
        $data,
        422,
        ['errors' => ['address']],
        ['address' => 'The address field must be a string.']
    ));

    $data['address'] = 'Lorem ipsum.';
    test('validation error address too short', validateContactPostData(
        $data,
        422,
        ['errors' => ['address']],
        ['address' => 'The address field must be at least 15 characters.']
    ));

    $data['address'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
    test('validation error address too long', validateContactPostData(
        $data,
        422,
        ['errors' => ['address']],
        ['address' => 'The address field must not be greater than 100 characters.']
    ));
    $data['address'] = data['address']; // reset address value



    /**
     * BIRTHDAY TESTS
     */
    $data['birthday'] = [];
    test('validation error birthday array', validateContactPostData(
        $data,
        422,
        ['errors' => ['birthday']],
        ['birthday' => 'The birthday field must be a valid date.']
    ));

    $data['birthday'] = 'birthday';
    test('validation error birthday string', validateContactPostData(
        $data,
        422,
        ['errors' => ['birthday']],
        ['birthday' => 'The birthday field must be a valid date.']
    ));

    $data['birthday'] = 1;
    test('validation error birthday integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['birthday']],
        ['birthday' => 'The birthday field must be a valid date.']
    ));

    $data['birthday'] = false;
    test('validation error birthday false', validateContactPostData(
        $data,
        422,
        ['errors' => ['birthday']],
        ['birthday' => 'The birthday field must be a valid date.']
    ));

    $data['birthday'] = true;
    test('validation error birthday true', validateContactPostData(
        $data,
        422,
        ['errors' => ['birthday']],
        ['birthday' => 'The birthday field must be a valid date.']
    ));

    $data['birthday'] = '30.30.2023';
    test('validation error birthday invalid date', validateContactPostData(
        $data,
        422,
        ['errors' => ['birthday']],
        ['birthday' => 'The birthday field must be a valid date.']
    ));
    $data['birthday'] = data['birthday']; // reset birthday value



    /**
     * CONTACT GROUPS TESTS
     */
    $data['contact_groups'] = [];
    test('validation error contact groups array', validateContactPostData(
        $data,
        422,
        ['errors' => ['contact_groups']],
        ['contact_groups' => 'The contact groups field must be a valid JSON string.']
    ));

    $data['contact_groups'] = [1];
    test('validation error contact groups array integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['contact_groups']],
        ['contact_groups' => 'The contact groups field must be a valid JSON string.']
    ));

    $data['contact_groups'] = 'contact_groups';
    test('validation error contact groups string', validateContactPostData(
        $data,
        422,
        ['errors' => ['contact_groups']],
        ['contact_groups' => 'The contact groups field must be a valid JSON string.']
    ));
    $data['contact_groups'] = data['contact_groups']; // reset contact_groups value



    /**
     * ROLE TESTS
     */
    $data['role'] = [];
    test('validation error role array', validateContactPostData(
        $data,
        422,
        ['errors' => ['role']],
        ['role' => [
            "The role field must be a string.",
            "The selected role is invalid."
        ]]
    ));

    $data['role'] = 1;
    test('validation error role integer', validateContactPostData(
        $data,
        422,
        ['errors' => ['role']],
        ['role' => [
            "The role field must be a string.",
            "The selected role is invalid."
        ]]
    ));

    $data['role'] = 'invalid';
    test('validation error role invalid', validateContactPostData(
        $data,
        422,
        ['errors' => ['role']],
        ['role' => [
            "The role field must be a string.",
            "The selected role is invalid."
        ]]
    ));
});
