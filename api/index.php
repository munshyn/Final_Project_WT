<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'db.php';


$app = new \Slim\App;
//routes for students
//require_once('student.php');
//routes for managers
require_once('manager.php');
//routes for colleges
require_once('college.php');
//routes for admins
require_once('admin.php');

require_once('users.php');

//add a new patient
$app->post('/login', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody());
    if (empty($data->email) || empty($data->password)) {
        return $response->withJson(array('error' => 'Missing required fields'), 400);
    }
    $email = $data->email;
    $password = $data->password;

    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        //check if user exist or not, otherwise return 200, with error message
        if (count($user) == 0) {
            return $response->withJson(array('error' => 'User not found'), 404);
        }
        //else return 200, with user 
        session_start();
        $_SESSION['email'] = $user[0]->email;
        $_SESSION['name'] = $user[0]->name;
        $_SESSION['level'] = $user[0]->level;
        $_SESSION['userId'] = $user[0]->userId;
        // $_SESSION['email'] = $user[0]['email'];
        // $_SESSION['name'] = $user[0]['name'];
        // $_SESSION['level'] = $user[0]['level'];
        // $_SESSION['userId'] = $user[0]['userId'];
        $data = array(
            'users' => $user[0],
        );
        return $response->withJson($data, 200);
    } catch (PDOException $e) {
        $error = array(
            'error' => $e->getMessage(),
        );
        return $response->withJson($error, 400);
    }
});

$app->get('/', function () {
    echo "Hello, world";
});

$app->run();
