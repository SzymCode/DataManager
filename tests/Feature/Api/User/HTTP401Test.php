<?php


describe('401', function () {
    test('unauthorized index api', apiTest(
        'GET',
        'users.index',
        401,
        null,
        ['message'],
        ['message' => 'Unauthenticated.']
    ));

    test('unauthorized show api', apiTest(
        'SHOW',
        'users.show',
        401,
        1,
        ['message'],
        ['message' => 'Unauthenticated.']
    ));

    test('unauthorized store api with data', apiTest(
        'POST',
        'users.store',
        401,
        userData,
        ['message'],
        ['message' => 'Unauthenticated.']
    ));

    test('unauthorized store api empty json', apiTest(
        'POST',
        'users.store',
        401,
        [],
        ['message'],
        ['message' => 'Unauthenticated.']
    ));

    test('unauthorized update api with data', apiTest(
        'PUT',
        'users.update',
        401,
        userData,
        ['message'],
        ['message' => 'Unauthenticated.']
    ));

    test('unauthorized update api empty json', apiTest(
        'PUT',
        'users.update',
        401,
        [],
        ['message'],
        ['message' => 'Unauthenticated.']
    ));

    test('unauthorized destroy api', apiTest(
        'DELETE',
        'users.destroy',
        401,
        null,
        ['message'],
        ['message' => 'Unauthenticated.']
    ));
});
