<?php

namespace AquariumShop;

class Shop
{
    /**
     * @var Product[]
     */
    protected $products = [];

    public function addNewProduct(Product $product)
    {
        if (!in_array($product, $this->products)) {
            $this->products[] = $product;
        }
    }

    public function buyProduct(\App\User $user, Product $product)
    {
        if ($user->getMoney() > $product->getPrice()) {
            $user->takeMoney($product->getPrice());
            $user->addItem($product->getItem());
            return "User " . $user->getName() . " buy a " . $product->getItem()->getName() . "<br>\n";
        }
        return "User " . $user->getName() . " (" . $user->getMoney(
        ) . ") has so less money for buy " . $product->getItem()->getName() . "(" . $product->getPrice() . ")!<br>\n";

    }

    public function getAllProducts()
    {
        return $this->products;
    }

    public function __toString()
    {
        $result = "Shop has a next items: <br>\n";
        foreach ($this->getAllProducts() as $product) {
            $result .= $product;
        }
        $result .= "<br>\n";
        return $result;
    }

}
