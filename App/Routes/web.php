<?php

$cms->router->get('user/detail/(\d+)', 'User@showProfile');
$cms->router->get('test', 'User@Test');
$cms->router->post('get-test', 'User@getTest');