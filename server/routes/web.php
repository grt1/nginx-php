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
    // mstDistributionProcessing
    $router->get('mstDistributionProcessing', ['uses' => 'MstDistributionProcessingController@getAll']);
    $router->get('mstDistributionProcessing/{id}', ['uses' => 'MstDistributionProcessingController@getOne']);
    $router->post('mstDistributionProcessing', ['uses' => 'MstDistributionProcessingController@create']);
    $router->delete('mstDistributionProcessing/{id}', ['uses' => 'MstDistributionProcessingController@delete']);
    $router->put('mstDistributionProcessing/{id}', ['uses' => 'MstDistributionProcessingController@update']);
    // mstInchargMd
    $router->get('mstInchargMd', ['uses' => 'mstInchargMdController@getAll']);
    $router->get('mstInchargMd/{id}', ['uses' => 'mstInchargMdController@getOne']);
    $router->post('mstInchargMd', ['uses' => 'mstInchargMdController@create']);
    $router->delete('mstInchargMd/{id}', ['uses' => 'mstInchargMdController@delete']);
    $router->put('mstInchargMd/{id}', ['uses' => 'mstInchargMdController@update']);
});

$router->group(['prefix' => 'dev'], function ($router) {
    $router->get('fromdb/{table}', ['uses' => 'FromdbController@getAll']);
    $router->get('fromdb/{table}/{id}', ['uses' => 'FromdbController@getOne']);
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});