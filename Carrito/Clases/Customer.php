<?php
session_start();

class Customer{

    public function __construct(protected string $name, 
    protected string $email, 
    protected int $phone, 
    protected string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function __set($name = null, $value = null){

        switch ($name) {
            case 'name':
                is_string($value) ? $this->name = $value : null;
                break;
            
            case 'email':
                is_string($value) ? $this->email = $value : null;
                break;

            case 'phone':
                is_int($value) ? $this->phone = $value : null;
                break;

            case 'password':
                is_string($value) ? $this->password = $value : null;
                break;

            default:
                echo 'Not found: '.$name;
                break;
        }
    }

    public function __get($name){


        switch ($name) {
            case 'name':
                return $this->name;
                break;
            
            case 'email':
                return $this->email;
                break;

            case 'phone':
                return $this->phone;
                break;

            case 'password':
                return $this->password;
                break;

            default:
                echo 'Not found: '.$name;
                break;
        }
    }

    public function printAll(){
        return "$this->name $this->email $this->phone $this->password";
    }

    public function logout(){
        session_unset();
        session_destroy();
    }
}