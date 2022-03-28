<?php
namespace coding\app\models;



class Category extends Model{
   

    function __construct()
    {
        parent::$tblName="category";
        
    }

    function __set($name, $value)
    {
        $this->$name=$value;
        
    }

}