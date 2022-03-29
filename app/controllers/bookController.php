<?php
namespace coding\app\controllers;

use coding\app\models\Book;

class BookController extends Controller{

    function newBook(){
        $this->Dashboard_view('new_Book');
    }

      

    public function saveBook(){

        
        if(isset($_FILES['uploadfile']) 
        && $_FILES['uploadfile']['error'] == UPLOAD_ERR_OK){
        $info = getimagesize($_FILES['uploadfile']['tmp_name']);
        $allowedTypes = [IMAGETYPE_JPEG=>'.jpg',
                         IMAGETYPE_PNG=>'.png',
                         IMAGETYPE_GIF=>'.gif'];//accept jpg, png, gif
        if($info === false){ // no go
            
        $this->Dashboard_view('feedback',['danger'=>'bad file format']);
        }else if(!array_key_exists($info[2], $allowedTypes)){ // no go
        
            $this->Dashboard_view('feedback',['danger'=>'not acceped file ']);
        }else{
          //save the picture in the images folder
        //   $path = getcwd().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;
          $path ="assets/upload/";
          $filename = uniqid().$allowedTypes[$info[2]];
          move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path.$filename);
     
        
          $book=new Book();
          $book->product_name=$_POST['name'];
          $book->product_price=$_POST['price'];
          $book->category_id=1;
          $book->product_image=$filename;
          
          $book->save();
          if($book)
          
          $this->Dashboard_view('feedback',['success'=>'book inserted successful']);
          else 
          $this->Dashboard_view('feedback',['danger'=>'can not add book']);
        }
      }else{
        $this->Dashboard_view('feedback',['danger'=>'can not add book']);
      }






    }





}
?>