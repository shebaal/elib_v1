<?php
namespace coding\app\controllers;

use coding\app\system\AppSystem;
use coding\app\system\Request;
use coding\app\system\Router;

class Controller{

   function view($viewName,$params=[]){
       AppSystem::$appSystem->router->view($viewName,$params);
   }

   function Dashboard_view($viewName,$params=[]){
    AppSystem::$appSystem->router->Dashboard_view($viewName,$params);
}

function website_view($viewName,$params=[]){
    AppSystem::$appSystem->router->website_view($viewName,$params);
}

}
?>