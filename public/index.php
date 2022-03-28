<?php
require_once __DIR__ . '/../vendor/autoload.php';

use coding\app\controllers\AuthorsController;
use coding\app\controllers\PublishersController;






use coding\app\system\AppSystem;
use coding\app\system\Router;
use coding\app\controllers\UsersController;

use Dotenv\Dotenv;


// website controller 
use coding\app\controllers\website\HomeController;
use coding\app\controllers\website\detailsController;
use coding\app\controllers\website\confirmController;
use coding\app\controllers\website\categoriesController;
use coding\app\controllers\website\cartController;


$dotenv = Dotenv::createImmutable(dirname(__DIR__));//createImmutable(__DIR__);
$dotenv->load();

$config=array(
  'servername'=>$_ENV['DB_SERVER_NAME'],
  'dbname'=>$_ENV['DB_NAME'],
  'dbpass'=>$_ENV['DB_PASSWORD'],
  'username'=>$_ENV['DB_USERNAME']

);
$system=new AppSystem($config);

Router::get('/users',[UsersController::class,'show']);


Router::get('/books',function(){
  echo "books route path";
});

Router::get('/new_user',[UsersController::class,'register']);

Router::get('/remove_user',[UsersController::class,'delete']);

Router::post('/users',[UsersController::class,'show']);
Router::get('/dashboard/new_user',[UsersController::class,'newUser']);

Router::post('/dashboard/save_user',[UsersController::class,'saveUser']);
Router::get('/save_author',[AuthorsController::class,'createAuthor']);



//website router
Router::get('/home',[HomeController::class,'home']);
Router::get('/details',[detailsController::class,'index']);
Router::get('/categories',[categoriesController::class,'index']);
Router::get('/cart',[cartController::class,'index']);
Router::get('/confirm',[confirmController::class,'index']);



$system->start();

