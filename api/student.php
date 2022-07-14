<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//return json object of all students
$app->get('/students', function (Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM student";
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
        return $response->withJson($data, 200);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        return $response->withJson($error, 400);
    }
});


//get singgle student by id
$app->get('/students/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM student WHERE id = '$id'";
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
        return $response->withJson($data, 200);
    } catch (PDOException $e) {
        $error = array(
            'status' => 'Error',
            'message' => $e->getMessage(),
        );
        return $response->withJson($error, 400);
    }
});

//add a new student
$app->post('/students', function (Request $request, Response $response, array $args) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO student (id, username, password, level, name, email, gender) VALUES (:id, :username, :password, :level, :name, :email, :gender)";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':level', $level);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender',$gender);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        //check if insert was successful, otherwise return 400, with error message
        if ($count == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to create new student'), 400);
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

//update student by id
$app->put('/students/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $input = $request->getParsedBody();
    $sql = "UPDATE student SET username = :username, password = :password, level = :level, name = :name, email = :email, gender = :gender WHERE id = :id";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $input['username']);
        $stmt->bindParam(':password',$input['password']);
        $stmt->bindParam(':level',$input['level']);
        $stmt->bindParam(':name', $input['name']);
        $stmt->bindParam(':email',$input['email']);
        $stmt->bindParam(':gender',$input['gender']);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        if($count == 0){
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to update student'), 400);
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

//delete student by id
$app->delete('/students/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "DELETE FROM student WHERE id = '$id'";

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
