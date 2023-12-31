<?php

$cms->router->before('GET|POST','/','Middlewares\Auth@isLogin');
$cms->router->before('GET|POST','/customer.*','Middlewares\Auth@isLogin');
$cms->router->before('GET|POST','/project.*','Middlewares\Auth@isLogin');

$cms->router->get('/', 'Controllers\Home@Index');

$cms->router->get('/login', 'Controllers\Auth@Index');
$cms->router->post('/login', 'Controllers\Auth@Login');
$cms->router->get('/logout', 'Controllers\Auth@Logout');

$cms->router->mount('/customer', function() use ($cms) {
    $cms->router->get('/', 'Controllers\Customer@Index');
    $cms->router->get('/add', 'Controllers\Customer@Add');
    $cms->router->post('/add', 'Controllers\Customer@CreateCustomer');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Customer@Edit');
    $cms->router->post('/edit', 'Controllers\Customer@EditCustomer');
    $cms->router->post('/delete', 'Controllers\Customer@DeleteCustomer');
});
$cms->router->mount('/project', function() use ($cms) {
    $cms->router->get('/', 'Controllers\Project@Index');
    $cms->router->get('/add', 'Controllers\Project@Add');
    $cms->router->post('/add', 'Controllers\Project@CreateProject');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Project@Edit');
    $cms->router->post('/edit', 'Controllers\Project@EditProject');
    $cms->router->post('/delete', 'Controllers\Project@DeleteProject');
});