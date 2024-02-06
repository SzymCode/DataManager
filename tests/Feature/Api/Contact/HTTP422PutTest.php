<?php


beforeEach(function () {
    $this->createUsers();
    $this->actingAs($this->admin);
});

describe('422 > PUT', function($updatedData = updatedData) {
    /**
     * USER ID TESTS
     */
    $updatedData['user_id'] = '';
    test('validation error no user_id', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['user_id']],
        ['errors' => [
            'user_id' => ['The user id field must be an integer.']
        ]]
    ));

    $updatedData['user_id'] = [];
    test('validation error invalid user_id array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['user_id']],
        ['errors' => [
            'user_id' => ['The user id field must be an integer.']
        ]]
    ));

    $updatedData['user_id'] = 'user_id';
    test('validation error invalid user_id string', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['user_id']],
        ['errors' => [
            'user_id' => ['The user id field must be an integer.']
        ]]
    ));

    $updatedData['user_id'] = false;
    test('validation error invalid user_id false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['user_id']],
        ['errors' => [
            'user_id' => ['The user id field must be an integer.']
        ]]
    ));
    $updatedData['user_id'] = updatedData['user_id']; // reset user_id value


    /**
     * FIRST NAME TESTS
     */
    $updatedData['first_name'] = '';
    test('validation error no first_name', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => ['The first name field is required.']
        ]]
    ));

    $updatedData['first_name'] = [];
    test('validation error first_name array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => ['The first name field is required.']
        ]]
    ));

    $updatedData['first_name'] = 1;
    test('validation error first_name integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => [
                'The first name field must be a string.',
                'The first name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['first_name'] = false;
    test('validation error first_name false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => [
                'The first name field must be a string.',
                'The first name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['first_name'] = true;
    test('validation error first_name true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => [
                'The first name field must be a string.',
                'The first name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['first_name'] = 'L';
    test('validation error first_name too short', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => ['The first name field must be at least 3 characters.']
        ]]
    ));

    $updatedData['first_name'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do et aliqua laborum.';
    test('validation error first_name too long', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['first_name']],
        ['errors' => [
            'first_name' => ['The first name field must not be greater than 30 characters.']
        ]]
    ));
    $updatedData['first_name'] = updatedData['first_name']; // reset first_name value


    /**
     * LAST NAME TESTS
     */
    $updatedData['last_name'] = [];
    test('validation error last_name array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['last_name']],
        ['errors' => [
            'last_name' => [
                'The last name field must be a string.',
                'The last name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['last_name'] = 1;
    test('validation error last_name integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['last_name']],
        ['errors' => [
            'last_name' => [
                'The last name field must be a string.',
                'The last name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['last_name'] = false;
    test('validation error last_name false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['last_name']],
        ['errors' => [
            'last_name' => [
                'The last name field must be a string.',
                'The last name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['last_name'] = true;
    test('validation error last_name true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['last_name']],
        ['errors' => [
            'last_name' => [
                'The last name field must be a string.',
                'The last name field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['last_name'] = 'L';
    test('validation error last_name too short', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['last_name']],
        ['errors' => [
            'last_name' => ['The last name field must be at least 3 characters.']
        ]]
    ));

    $updatedData['last_name'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do et aliqua laborum.';
    test('validation error last_name too long', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['last_name']],
        ['errors' => [
            'last_name' => ['The last name field must not be greater than 30 characters.']
        ]]
    ));
    $updatedData['last_name'] = updatedData['last_name']; // reset last_name value



    /**
     * EMAIL TESTS
     */
    $updatedData['email'] = 'admin.example.com';
    test('validation error wrong email format', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => ['The email field must be a valid email address.']
        ]]
    ));

    $updatedData['email'] = [];
    test('validation error email array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['email'] = 1;
    test('validation error email integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['email'] = false;
    test('validation error email false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));

    $updatedData['email'] = true;
    test('validation error email true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['email']],
        ['errors' => [
            'email' => [
                'The email field must be a valid email address.',
                'The email field must be at least 3 characters.'
            ]
        ]]
    ));
    $updatedData['email'] = updatedData['email']; // reset email value



    /**
     * PERSONAL PHONE TESTS
     */
    $updatedData['personal_phone'] = [];
    test('validation error personal_phone array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['personal_phone']],
        ['errors' => [
            'personal_phone' => [
                'The personal phone field must be a string.',
                'The personal phone field must be at least 9 characters.',
                'The personal phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['personal_phone'] = false;
    test('validation error personal_phone false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['personal_phone']],
        ['errors' => [
            'personal_phone' => [
                'The personal phone field must be a string.',
                'The personal phone field must be at least 9 characters.',
                'The personal phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['personal_phone'] = true;
    test('validation error personal_phone true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['personal_phone']],
        ['errors' => [
            'personal_phone' => [
                'The personal phone field must be a string.',
                'The personal phone field must be at least 9 characters.',
                'The personal phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['personal_phone'] = '9876543';
    test('validation error personal_phone too short', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['personal_phone']],
        ['errors' => [
            'personal_phone' => [
                'The personal phone field must be at least 9 characters.',
                'The personal phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['personal_phone'] = '98 76 543 210 123';
    test('validation error personal_phone too long', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['personal_phone']],
        ['errors' => [
            'personal_phone' => [
                'The personal phone field must not be greater than 9 characters.',
                'The personal phone field format is invalid.'
            ]
        ]]
    ));
    $updatedData['personal_phone'] = updatedData['personal_phone']; // reset personal_phone value



    /*
     * WORK PHONE TESTS
     */
    $updatedData['work_phone'] = [];
    test('validation error work_phone array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['work_phone']],
        ['errors' => [
            'work_phone' => [
                'The work phone field must be a string.',
                'The work phone field must be at least 9 characters.',
                'The work phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['work_phone'] = false;
    test('validation error work_phone false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['work_phone']],
        ['errors' => [
            'work_phone' => [
                'The work phone field must be a string.',
                'The work phone field must be at least 9 characters.',
                'The work phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['work_phone'] = true;
    test('validation error work_phone true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['work_phone']],
        ['errors' => [
            'work_phone' => [
                'The work phone field must be a string.',
                'The work phone field must be at least 9 characters.',
                'The work phone field format is invalid.'
            ]
        ]]
    ));

    $updatedData['work_phone'] = '9876543';
    test('validation error work_phone too short', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['work_phone']],
        ['errors' => [
            'work_phone' => [
                'The work phone field format is invalid.',
                'The work phone field must be at least 9 characters.'
            ]
        ]]
    ));

    $updatedData['work_phone'] = '98 76 543 210 123';
    test('validation error work_phone too long', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['work_phone']],
        ['errors' => [
            'work_phone' => [
                'The work phone field format is invalid.',
                'The work phone field must not be greater than 9 characters.'
            ]
        ]]
    ));
    $updatedData['work_phone'] = updatedData['work_phone']; // reset work_phone value



    /**
     * ADDRESS TESTS
     */
    $updatedData['address'] = [];
    test('validation error address array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['address']],
        ['errors' => [
            'address' => [
                'The address field must be a string.',
                'The address field must be at least 15 characters.'
            ]
        ]]
    ));

    $updatedData['address'] = 1;
    test('validation error address integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['address']],
        ['errors' => [
            'address' => [
                'The address field must be a string.',
                'The address field must be at least 15 characters.'
            ]
        ]]
    ));

    $updatedData['address'] = false;
    test('validation error address false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['address']],
        ['errors' => [
            'address' => [
                'The address field must be a string.',
                'The address field must be at least 15 characters.'
            ]
        ]]
    ));

    $updatedData['address'] = true;
    test('validation error address true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['address']],
        ['errors' => [
            'address' => [
                'The address field must be a string.',
                'The address field must be at least 15 characters.'
            ]
        ]]
    ));

    $updatedData['address'] = 'Lorem ipsum.';
    test('validation error address too short', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['address']],
        ['errors' => [
            'address' => ['The address field must be at least 15 characters.']
        ]]
    ));

    $updatedData['address'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
    test('validation error address too long', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['address']],
        ['errors' => [
            'address' => ['The address field must not be greater than 100 characters.']
        ]]
    ));
    $updatedData['address'] = updatedData['address']; // reset address value



    /**
     * BIRTHDAY TESTS
     */
    $updatedData['birthday'] = [];
    test('validation error birthday array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['birthday']],
        ['errors' => [
            'birthday' => ['The birthday field must be a valid date.']
        ]]
    ));

    $updatedData['birthday'] = 'birthday';
    test('validation error birthday string', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['birthday']],
        ['errors' => [
            'birthday' => ['The birthday field must be a valid date.']
        ]]
    ));

    $updatedData['birthday'] = 1;
    test('validation error birthday integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['birthday']],
        ['errors' => [
            'birthday' => ['The birthday field must be a valid date.']
        ]]
    ));

    $updatedData['birthday'] = false;
    test('validation error birthday false', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['birthday']],
        ['errors' => [
            'birthday' => ['The birthday field must be a valid date.']
        ]]
    ));

    $updatedData['birthday'] = true;
    test('validation error birthday true', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['birthday']],
        ['errors' => [
            'birthday' => ['The birthday field must be a valid date.']
        ]]
    ));

    $updatedData['birthday'] = '30.30.2023';
    test('validation error birthday invalid date', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['birthday']],
        ['errors' => [
            'birthday' => ['The birthday field must be a valid date.']
        ]]
    ));
    $updatedData['birthday'] = updatedData['birthday']; // reset birthday value



    /*
     * CONTACT GROUPS TESTS
     */
    $updatedData['contact_groups'] = [];
    test('validation error contact groups array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['contact_groups']],
        ['errors' => [
            'contact_groups' => ['The contact groups field must be a valid JSON string.']
        ]]
    ));

    $updatedData['contact_groups'] = [1];
    test('validation error contact groups array integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['contact_groups']],
        ['errors' => [
            'contact_groups' => ['The contact groups field must be a valid JSON string.']
        ]]
    ));

    $updatedData['contact_groups'] = 'contact_groups';
    test('validation error contact groups string', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['contact_groups']],
        ['errors' => [
            'contact_groups' => ['The contact groups field must be a valid JSON string.']
        ]]
    ));
    $updatedData['contact_groups'] = updatedData['contact_groups']; // reset contact_groups value



    /**
     * ROLE TESTS
     */
    $updatedData['role'] = [];
    test('validation error role array', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['role']],
        ['errors' => [
            'role' => [
                'The role field must be a string.',
                'The selected role is invalid.'
            ]
        ]]
    ));

    $updatedData['role'] = 1;
    test('validation error role integer', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['role']],
        ['errors' => [
            'role' => [
                'The role field must be a string.',
                'The selected role is invalid.'
            ]
        ]]
    ));

    $updatedData['role'] = 'invalid';
    test('validation error role invalid', apiTest(
        'PUT',
        'contacts.update',
        422,
        $updatedData,
        ['errors' => ['role']],
        ['errors' => [
            'role' => ['The selected role is invalid.']
        ]]
    ));
});
