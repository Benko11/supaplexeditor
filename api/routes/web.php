<?php

$router->group(['prefix' => 'api/v1'], function() use ($router){
    $router->get('levels/{id}', 'LevelController@show');
    $router->get('elements', 'ElementController@index');
    $router->get('elements/images', 'ElementController@indexImages');
});

$router->get('/test', 'LevelController@test');