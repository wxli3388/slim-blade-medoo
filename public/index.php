<?php 

use App\Myclass\Myclass;
use Src\DB\DB;
use Src\Views\Views;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . "/../vendor/autoload.php";

/**
 * DEBUG MODE
 * displayErrorDetails => true   
 */
//$app = new \Slim\App;
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true] ]);

$app->get('/', function (Request $request, Response $response, array $args) {
    
    //class exmaple 
    //$myclass = new Myclass();
    //var_dump($myclass->selectDB());

    $views = Views::getInstance();
    $title = 'this is my title';
    echo $views->render('index', compact('title')); //render index.blade.php under views folder
});




$app->run();
