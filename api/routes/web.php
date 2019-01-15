<?php

$router->group(['prefix' => 'api/v1'], function() use ($router){
    $router->get('levels/{id}', 'LevelController@show');
});

$router->get('/test', 'LevelController@test');