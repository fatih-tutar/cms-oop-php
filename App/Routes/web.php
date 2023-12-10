<?php

$cms->router->get('user/detail/(\d+)', 'User@showProfile');
$cms->router->get('test', 'User@Test');
$cms->router->get('get-test', 'User@getTest');
$cms->router->get('/', 'Home@Index');