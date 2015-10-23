<?php

namespace AquariumShop;

interface ItemInterface
{
    public function getName();
    public function getDescription();
    public function __toString();
}