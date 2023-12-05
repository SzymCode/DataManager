<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

$data = require_once 'tests\TestConstants.php';
$updatedData = require_once 'tests\TestConstants.php';
$userData = require_once 'tests\TestConstants.php';
$updatedUserData = require_once 'tests\TestConstants.php';
$adminData = require_once 'tests\TestConstants.php';

uses(
    Tests\TestCase::class,
    // Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature', 'Unit', 'Global');


/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function apiTest($method, $route, $data, $status, $expectedJsonStructure, $validationErrors): Closure
{
    return function () use ($method, $route, $data, $status, $expectedJsonStructure, $validationErrors) {
        $request = match ($method) {
            'POST' => $this->postJson(route($route), $data),
            'PUT' => $this->putJson(route($route, auth()->user()), $data),
        };

        if ($request) {
            $request->assertStatus($status)
                ->assertJsonStructure($expectedJsonStructure)
                ->assertJsonValidationErrors($validationErrors);
        }
    };
}

// TEST GROUPS

uses()
    ->group('feature')
    ->in('Feature');

uses()
    ->group('contactapi')
    ->in('Feature/Api/Contact');

uses()
    ->group('userapi')
    ->in('Feature/Api/User');

uses()
    ->group('database')
    ->in('Feature/Database');

uses()
    ->group('factories')
    ->in('Feature/Database/Factories');

uses()
    ->group('migrations')
    ->in('Feature/Database/Migrations');

uses()
    ->group('database-sanctum')
    ->in('Feature/Database/Sanctum');

uses()
    ->group('seeders')
    ->in('Feature/Database/Seeders');

uses()
    ->group('sanctum')
    ->in('Feature/Sanctum');

uses()
    ->group('global')
    ->in('Global');

uses()
    ->group('unit')
    ->in('Unit');

uses()
    ->group('controllers')
    ->in('Unit/Controllers');

uses()
    ->group('models')
    ->in('Unit/Models');
