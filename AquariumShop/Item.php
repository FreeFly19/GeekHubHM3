<?php

namespace AquariumShop;

class Item implements ItemInterface
{
    private $name;
    private $desc;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->desc = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->desc;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return "Name of item: " . $this->getName() . "<br>\nDescription : " . $this->getDescription() . "<br>\n";
    }
}