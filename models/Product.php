<?php

class product
{
    private $id;
    private $name;
    private $description;
    private $quantity;
    private $price;

    function __construct($id,$name,$description,$quantity,$price){
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->quantity=$quantity;
        $this->price=$price;
    }

    function getId(){
        return $this->id;
    }

    function getName(){
        return $this->name;
    }

    function getDescription(){
        return $this->description;
    }

    function getQuantity(){
        return $this->quantity;
    }

    function getPrice(){
        return $this->price;
    }

    
}

?>