<?php

class Product{

    public function __construct(
        protected int $id,
        protected string $name, 
        protected float $price, 
        protected string $img,
        protected string $description,
        protected int $qty = 0,
        protected float $subtotal = 0)

    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->img = $img;
        $this->description = $description;
        $this->qty = $qty;
        $this->subtotal = $subtotal;
    }

    public function __set($name, $value){

        switch ($name) {
            case 'id':
                is_int($value)?$this->id = $value : null;
            case 'name':
                is_string($value)?$this->name = $value : null;
                break;
            
            case 'price':
                is_float($value)? $this->price = $value : null;
                break;

            case 'description':
                is_string($value) ? $this->description = $value : null;
                break;

            case 'qty':
                is_int($value) ? $this->qty .= $value : null;
                break;

            case 'subtotal':
                is_float($value) ? $this->subtotal .= $value : null;
                break;

            default:
                echo 'Not found: '.$name;
                break;
        }
    }

    public function __get($value){

        switch ($value) {
            case 'id':
                return $this->id;
                break;

            case 'name':
                return $this->name;
                break;
            
            case 'price':
                return $this->price;
                break;

            case 'img':
                return $this->img;
                break;

            case 'description':
                return $this->description;
                break;
            
            case 'qty':
                return $this->qty;
                break;

            case 'subtotal':
                return $this->subtotal;
                break;

            default:
                echo 'Not found: '.$value;
                break;
        }
    }

    public function printAll(){
        return "$this->name $this->price $this->description";
    }
}