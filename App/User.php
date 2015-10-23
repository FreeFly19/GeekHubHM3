<?php

namespace App;

class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var number
     */
    private $money;

    /**
     * @var \AquariumShop\Item[]
     */
    private $items = [];

    /**
     * @param string $name
     * @param number $money
     */
    function __construct($name, $money)
    {
        $this->money = $money;
        $this->name = $name;
    }

    /**
     * @param number $money
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }

    /**
     * @return number
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function takeMoney($changeMoney)
    {
        $this->money -= $changeMoney;
    }

    public function giveMoney($changeMoney)
    {
        $this->money += $changeMoney;
    }

    public function addItem(\AquariumShop\Item $item)
    {
        $this->items[] = $item;
    }

    public function getAllItems()
    {
        return $this->items;
    }

    public function __toString()
    {
        $result = "Name of user: " . $this->getName() . "<br>\nHave " . $this->getMoney(
            ) . " money<br>\nHave a items:<br>\n";

        foreach ($this->getAllItems() as $item) {
            $result .= $item;
        }
        $result .= "<br>\n";
        return $result;
    }
}