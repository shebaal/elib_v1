<?php
namespace coding\app\controllers;

use coding\app\models\Category;

class CategoryController extends Controller{

    function newCategory(){
        $this->Dashboard_view('new_category');
    }

      

    public function saveCategory(){

        
  
        
          $category=new Category();
          $category->category_name=$_POST['name'];
          
          $category->save();
          if($category->save())
          
          $this->Dashboard_view('feedback',['success'=>'category inserted successful']);
          else 
          $this->Dashboard_view('feedback',['danger'=>'can not add category']);
        }
      


}
?>