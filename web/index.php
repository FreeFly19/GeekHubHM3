<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new App\Application();


$app->get(
    '/',
    function(){
        echo "Hello, world!!";
    }
);

$app->get(
    '/{name}',
    function($name){
        echo "Hello, $name";
    }
);

$app->get(
    'main/{name}/{kel}',
    function($name, $kel){
        echo "Hello,". $name. " " .$kel;
    }
);

$app->run();