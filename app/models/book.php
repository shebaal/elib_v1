<?php
namespace coding\app\models;



class Book extends Model{
   

    function __construct()
    {
        parent::$tblName="product";
        
    }

    function __set($name, $value)
    {
        $this->$name=$value;
        
    }

}