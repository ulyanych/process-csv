<?php

namespace App\Models;

class Room
{
    const CURRENCY = 'RUB';
    const TYPES = ['Econom', 'Standart Room', 'King Room'];
    const NIGHTS = ['7 nights', '10 nights'];
    const FOOD = ['AI', 'BB'];


    /* @var string */
    protected $name;

    /* @var float */
    protected $price;


    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }
}