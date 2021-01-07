<?php

$router->group(['prefix' => 'v1'], function($router) {
  $router->get('products', 'AppController@index');
});


