<?php

$router->get('/', 'App\Http\IndexController@index');
$router->get('/login-render', 'App\Http\AuthenticationController@loginRender');
$router->post('/login', 'App\Http\AuthenticationController@login');
$router->get('/signup-render', 'App\Http\AuthenticationController@signUpRender');
$router->post('/signup', 'App\Http\AuthenticationController@signUp');
$router->get('/logout', 'App\Http\AuthenticationController@logOut');
$router->post('/search', 'App\Http\SearchController@search');