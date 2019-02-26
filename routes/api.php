<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () {
    return 'geo-flota';
});

$api = $app->make(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {
    $api->post('/auth/login', [
        'as' => 'api.auth.login',
        'uses' => 'App\Http\Controllers\Auth\AuthController@login',
    ]);

    $api->group([
        'middleware' => 'api.auth',
    ], function ($api) {
        $api->get('/', [
            'uses' => 'App\Http\Controllers\APIController@getIndex',
            'as' => 'api.index'
        ]);
        $api->get('/auth/user', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@getUser',
            'as' => 'api.auth.user'
        ]);
        $api->patch('/auth/refresh', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@patchRefresh',
            'as' => 'api.auth.refresh'
        ]);
        $api->delete('/auth/invalidate', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@deleteInvalidate',
            'as' => 'api.auth.invalidate'
        ]);

        // companies routes

        $api->get('/companies/{id}', [
            'uses' => 'App\Http\Controllers\CompanyController@getCompany',
            'as' => 'api.company.getCompany'
        ]);

        $api->get('/companies', [
            'uses' => 'App\Http\Controllers\CompanyController@getAll',
            'as' => 'api.company.getAll'
        ]);

        $api->post('/companies', [
            'uses' => 'App\Http\Controllers\CompanyController@create',
            'as' => 'api.company.create'
        ]);

        $api->delete('/companies/{id}', [
            'uses' => 'App\Http\Controllers\CompanyController@delete',
            'as' => 'api.company.delete'
        ]);

        $api->put('/companies/{id}', [
            'uses' => 'App\Http\Controllers\CompanyController@update',
            'as' => 'api.company.update'
        ]);

    });
});
