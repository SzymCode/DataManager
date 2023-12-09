<?php

it('should have test suffix')
    ->expect([
        'Tests\Feature',
        'Tests\Unit',
        'Tests\Global'
    ])
    ->toHaveSuffix('Test');

it('should have controller suffix')
    ->expect('App\Http\Controllers')
    ->toHaveSuffix('Controller');

it('should have request suffix')
    ->expect('App\Http\Requests')
    ->toHaveSuffix('Request')
    ->toBeUsedIn('App\Http\Controllers');

it('should have provider suffix')
    ->expect('App\Http\Providers')
    ->toHaveSuffix('Provider');

it('should have service suffix')
    ->expect('App\Http\Services')
    ->toHaveSuffix('Service');

it('should have transformer suffix')
    ->expect('App\Http\Transformers')
    ->toHaveSuffix('Transformer');

it('should have factory suffix')
    ->expect('Database\Factories')
    ->toHaveSuffix('Factory');

it('should have seeder suffix')
    ->expect('Database\Seeders')
    ->toHaveSuffix('Seeder');

it('should have component suffix')
    ->expect('Resources\js\Components')
    ->toHaveSuffix('Component');
