<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'db.php';


$app = new \Slim\App;
//routes for students
require_once('student.php');
//routes for managers
require_once('collegeapp.php');
//routes for colleges
require_once('college.php');

$app->get('/', function () {
    echo "Hello, world";
});

$app->run();
?>