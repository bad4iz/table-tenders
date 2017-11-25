<?php

require($_SERVER['DOCUMENT_ROOT'] . "/lib/notorm-master/NotORM.php");
require($_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];


$app = new \Slim\App($config);

$container = $app->getContainer();

$container['db'] = function ($container) {
    $capsule =  new NotORM(new PDO("mysql:dbname=tableTenders;host=172.17.0.1:3308;charset=utf8", 'root', 'pass'));
    return $capsule;
};

///////////////////////////////////////////////////////////////////////////
/// /////        route
/// ///////////////////////////////////////////////////////////////////

//// Define app routes
$app->post('/table-tenders/app/set', function ($request, $response, $args) {

    return $response->withJson($this->db->mains());
//    return $response->write(file_get_contents('index.html' ,  FILE_USE_INCLUDE_PATH));
});

// Run app
$app->run();