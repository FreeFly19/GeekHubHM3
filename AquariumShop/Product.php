<?php

namespace AquariumShop;

class Product
{
    /**
     * @var ItemInterface
     */
    private $item;
    /**
     * @var number
     */
    private $price;

    /**
     * @param ItemInterface $item
     * @param number $price
     */
    public function __construct(ItemInterface $item, $price)
    {
        $this->item = $item;
        $this->setPrice($price);
    }

    /**
     * @return ItemInterface
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @return number
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        if($price>0)
            $this->price = $price;
        else
            throw new \Exception("Price can't be less or equals 0");
    }

    public function __toString()
    {
        return "Item name: " . $this->item->getName() . "(" . $this->getPrice() . ")<br>\n";
    }
}
