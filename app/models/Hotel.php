<?php

namespace App\Models;

class Hotel
{
    const NAME = 'Hotel';
    const START_ID = 1100000;
    const STATE = ['quote', 'request'];


    /* @var int */
    protected $id;

    /* @var string */
    protected $name;

    /* @var string */
    protected $state;

    /* @var Room[] */
    protected $rooms;


    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setRooms(array $rooms): self
    {
        $this->rooms = $rooms;
        return $this;
    }

    public function addRoom(Room $room)
    {
        $this->rooms[] = $room;
    }

    public function getRooms()
    {
        return $this->rooms;
    }
}