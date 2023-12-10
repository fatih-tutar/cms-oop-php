<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

foreach(glob(__DIR__.'/App/Helpers/*.php') as $file){
    require $file;
}

require __DIR__.'/config.php';
require __DIR__.'/vendor/autoload.php';

$cms = new \Core\Starter();

require __DIR__.'/App/Routes/Route.php';