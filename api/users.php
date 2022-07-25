<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//return json object of all users
$app->get('/users', function (Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM users";
    try {
        //get the db object
        $dbStudent = new db();
        //connect
        $dbStudent  = $dbStudent->connect();

        $stmt = $dbStudent->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbStudent  = null;
        $data = array(
            'status' => 'Success',
            'message' => 'User found',
            'data' => $users,
        );
        echo json_encode($users);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        echo json_encode($users);
    }
});

//get all students
$app->get('/students', function (Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM users WHERE level = 3";
    try {
        //get the db object
        $dbStudent = new db();
        //connect
        $dbStudent  = $dbStudent->connect();

        $stmt = $dbStudent->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbStudent  = null;
        $data = array(
            'status' => 'Success',
            'message' => 'User found',
            'data' => $users,
        );
        echo json_encode($users);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        echo json_encode($users);
    }
});

//get single user by id
$app->get('/users/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM users WHERE userId = '$id'";
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
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'User not found'), 404);
        }
        //else return 200, with user data
        $data = array(
            'status' => 'Success',
            'message' => 'User found',
            'data' => $user,
        );
        echo json_encode($users);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        echo json_encode($users);
    }
});

//add a new user
$app->post('/users', function (Request $request, Response $response, array $args) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $name = $_POST['name'];

    $sql = "INSERT INTO users (email, password, level, name) VALUES (:email, :password, :level, :name)";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':name', $name);
    
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        //check if insert was successful, otherwise return 400, with error message
        if ($count == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to create new user'), 400);
        }
        //else return , with sucess message
        $data = array(
            'status' => 'success',
            'message' => 'User successfully added',
        );

        return $response->withJson($data, 201);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        return $response->withJson($error, 400);
    }
});

//update user by id
$app->put('/users/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $input = $request->getParsedBody();
    $sql = "UPDATE users SET email = :email, password = :password, level = :level, name = :name WHERE userId = :id";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $input['email']);
        $stmt->bindParam(':password',$input['password']);
        $stmt->bindParam(':level',$input['level']);
        $stmt->bindParam(':name', $input['name']);
        
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        if($count == 0){
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to update user'), 400);
        }
        $data = array(
            'status' => 'success',
            'message' => 'User successfully update',
        );
        return $response->withJson($data, 200);
        

    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        return $response->withJson($error, 400);
    }
});

//delete user by id
$app->delete('/users/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "DELETE FROM users WHERE userId = '$id'";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        //no user is deleted, thus, return 404
        if ($count == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'There is no user exist for the current Id'), 404);
        }
        $data = array(
            'status' => 'success',
            'message' => 'User successfully delete',
        );
        return $response->withJson($data, 200);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'unsuccessful',
            'message' => $e->getMessage(),
        );
        return $response->withJson($error, 400);
    }
});
?>
