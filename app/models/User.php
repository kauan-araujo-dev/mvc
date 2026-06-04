<?php

namespace App\Models;

class User {
    private ?int $id;
    private string $name;
    
    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    // Id
    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    //Name
    public function setName(int $name): void{
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}
