<?php
$router = new Router();

$router->get('/', 'MenuController@index');
$router->get('/menu/create', 'MenuController@create');
$router->post('/menu/store', 'MenuController@store');
$router->get('/menu/edit', 'MenuController@edit');
$router->post('/menu/update', 'MenuController@update');
$router->get('/menu/delete', 'MenuController@delete');
$router->get('/menu/show', 'MenuController@show');

return $router;
