<?php

// USE THIS IF YOU RUN TESTS ON LINUX
$articleData = require_once 'tests/TestConstants.php';
$updatedArticleData = require_once 'tests/TestConstants.php';
$contactData = require_once 'tests/TestConstants.php';
$updatedContactData = require_once 'tests/TestConstants.php';
$userData = require_once 'tests/TestConstants.php';
$updatedUserData = require_once 'tests/TestConstants.php';

// USE THIS IF YOU RUN TESTS ON WINDOWS
// $articleData = require_once 'tests\TestConstants.php';
// $updatedArticleData = require_once 'tests\TestConstants.php';
// $data = require_once 'tests\TestConstants.php';
// $updatedData = require_once 'tests\TestConstants.php';
// $userData = require_once 'tests\TestConstants.php';
// $updatedUserData = require_once 'tests\TestConstants.php';

use App\Models\Article;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;



if (env('DB_DATABASE') === 'database/database.sqlite') {
    uses(Tests\TestCase::class)
        ->beforeEach(function () {
            $this->artisan('migrate:fresh');
        })
        ->in('Feature', 'Database', 'Global');
} else {
    uses(
        Tests\TestCase::class,
    )
        ->in('Feature', 'Database');
    uses(
        RefreshDatabase::class
    )
        ->in(
            // Activity API
            'Feature/Api/Activity/HTTP401Test.php',

            // Article API
            'Feature/Api/Article/HTTP302Test.php',
            'Feature/Api/Article/HTTP422PutTest.php',

            // Artisan API
            'Feature/Api/Artisan/HTTP405AuthTest.php',
            'Feature/Api/Artisan/HTTP405UnAuthTest.php',

            // Contact API
            'Feature/Api/Contact/HTTP302Test.php',
            'Feature/Api/Contact/HTTP422PostTest.php',
            'Feature/Api/Contact/HTTP422PutTest.php',

            // User API
            'Feature/Api/User/HTTP302Test.php',
            'Feature/Api/User/HTTP422PostTest.php',
            'Feature/Api/User/HTTP422PutTest.php',

            // Sitemap API
            'Feature/Api/Sitemap',

            'Database/Models'
        );

    uses(
        DatabaseMigrations::class
    )
        ->in(
            // Activity API
            'Feature/Api/Activity/HTTP200Test.php',

            // Article API
            'Feature/Api/Article/HTTP200Test.php',
            'Feature/Api/Article/HTTP422PostTest.php',
            'Feature/Api/Article/HTTP500Test.php',

            // Artisan API
            'Feature/Api/Artisan/HTTP200Test.php',
            'Feature/Api/Artisan/HTTP500Test.php',

            // Contact API
            'Feature/Api/Contact/HTTP200Test.php',
            'Feature/Api/Contact/HTTP500Test.php',

            // User API
            'Feature/Api/User/HTTP200Test.php',
            'Feature/Api/User/HTTP500Test.php',


            'Database/Factories',
            'Database/Migrations',

            'Feature/Controllers',
            'Feature/Services'
        );
}

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

function apiTest($method, $route, $status, $data = null, $expectedJsonStructure = null, $expectedJsonFragment = null, $validationErrors = null): Closure
{
    return function () use ($method, $route, $data, $status, $expectedJsonStructure, $expectedJsonFragment, $validationErrors) {
        $request = match ($method) {
            'GET' => $this->getJson(route($route)),
            'SHOW' => $this->getJson(route($route, $data)),
            'POST' => $this->postJson(route($route), $data),
            'PUT' => $this->putJson(route($route, 1), $data),
            'DELETE' => $this->deleteJson(route($route, 1)),
        };

        $request->assertStatus($status);

        $expectedJsonStructure && $request->assertJsonStructure($expectedJsonStructure);
        $expectedJsonFragment && $request->assertJsonFragment($expectedJsonFragment);
        $validationErrors && $request->assertJsonValidationErrors($validationErrors);
    };
}

function expectLogMessage($log, $model, $method, $causer, $entity): void
{
    switch ($entity) {
        case 'Article':
            expect($log)->toContain('Article')->toContain($model->title)->toContain($method)->toContain($causer->name);
            break;
        case 'Contact':
            expect($log)->toContain('Contact')->toContain($model->first_name)->toContain($model->last_name)->toContain($method)->toContain($causer->name);
            break;
        case 'User':
            expect($log)->toContain('User')->toContain($model->name)->toContain($method)->toContain($causer->name);
            break;
        default:
            break;
    }
}

function getModelByEntity(string $entity): Contact|Article|User|null
{
    return match ($entity) {
        'Article' => new Article(['title' => 'Test Article']),
        'Contact' => new Contact(['first_name' => 'Test', 'last_name' => 'Name']),
        'User' => new User(['name' => 'Test Name']),
        default => null,
    };
}

function removeSitemap() {
    if (File::exists(public_path('sitemap.xml'))) {
        File::delete(public_path('sitemap.xml'));
    }
}

/**
 *  Feature groups
 */
uses()
    ->group('api')
    ->in('Feature/Api');

uses()
    ->group('activity-api')
    ->in('Feature/Api/Activity');

uses()
    ->group('article-api')
    ->in('Feature/Api/Article');

uses()
    ->group('artisan-api')
    ->in('Feature/Api/Artisan');

uses()
    ->group('user-api')
    ->in('Feature/Api/User');

uses()
    ->group('contact-api')
    ->in('Feature/Api/Contact');

uses()
    ->group('sitemap-api')
    ->in('Feature/Api/Sitemap');

uses()
    ->group('feature')
    ->in('Feature');

uses()
    ->group('global')
    ->in('Global');

uses()
    ->group('commands')
    ->in('Feature/Commands');

uses()
    ->group('controllers')
    ->in('Feature/Controllers');

uses()
    ->group('services')
    ->in('Feature/Services');

/**
 *  Database groups
 */
uses()
    ->group('database')
    ->in('Database');

uses()
    ->group('models')
    ->in('Database/Models');

uses()
    ->group('migrations')
    ->in('Database/Migrations');

uses()
    ->group('factories')
    ->in('Database/Factories');
