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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});


$router->group(['prefix' => 'getapi'], function ($api_names) use ($router) {
    // table name -> api name
    $api_names = [
        'authors' => 'abc'
    ];
    foreach ($api_names as $table => $api) {
        $router->get($api, ['uses' => 'AuthorController@showAllAuthors']);
        $router->get($api.'/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    }
});
