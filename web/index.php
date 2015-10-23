<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Application;
use App\User;
use AquariumShop\Shop;
use AquariumShop\Product;
use AquariumShop\Item;

$app = new Application();

$app->get(
    '/',
    function () {
        $shop = new Shop();
        $user = new User("Sasha", 100.99);
        $user2 = new User("Natasha", 50.3);
        $item = new Item("Tomato", "Red and very big Tomato");
        $item2 = new Item("Toy car", "Little toy - black car with opened door");
        $prod = new Product($item, 83.50);
        $prod2 = new Product($item2, 35.99);
        $shop->addNewProduct($prod);
        $shop->addNewProduct($prod2);
        echo $shop;
        echo $user;
        echo $user2;
        echo "<hr>";
        echo $shop->buyProduct($user, $prod);
        echo $shop->buyProduct($user, $prod2);
        echo $shop->buyProduct($user2, $prod2);
        echo "<hr>";
        echo $user;
        echo $user2;
    }
);


$app->get(
    '/Hello/{name}/',
    function ($name) {
        echo "Hello, $name!!!";
    }
);

$app->run();