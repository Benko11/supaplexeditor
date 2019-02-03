<?php

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('levels/{id}', 'LevelController@show');
    $router->get('levels', 'LevelController@index');
    $router->get('elements', 'ElementController@index');
    $router->get('elements/images', 'ElementController@indexImages');
});