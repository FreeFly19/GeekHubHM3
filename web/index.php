<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new App\Application();


$app->get(
    'main/{name}',
    function($name){
        echo "Hello, $name";
    }
);


$app->run();