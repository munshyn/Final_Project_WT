<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//return json object of all students application
$app->get('/collegeapps', function (Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM collegeapp";
    try {
        //get the db object
        $db = new db();
        //connect
        $db  = $db->connect();

        $stmt = $db->query($sql);
        $apps = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db  = null;
        $data = array(
            'status' => 'Success',
            'message' => 'Application found',
            'collegeapp' => $apps,
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


//get single student by id
$app->get('/collegeapps/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM collegeapp WHERE userId = '$id'";
    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $collegeapp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        //check if app exist or not, otherwise return 200, with error message
        if (count($collegeapp) == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Application not found'), 404);
        }
        //else return 200, with user data
        $data = array(
            'status' => 'Success',
            'message' => 'Application found',
            'collegeapp' => $collegeapp,
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

//add a new collegeapp
$app->post('/collegeapps', function (Request $request, Response $response, array $args) {
    $userId = $_POST['userId'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $collegeName = $_POST['collegeName'];
    $roomType = $_POST['roomType'];
    $appStatus = 'PENDING';

    $sql = "INSERT INTO collegeapp (userId, email, gender, collegeName, roomType, appStatus) VALUES (:userId, :email, :gender, :collegeName, :roomType, :appStatus)";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender',$gender);
        $stmt->bindParam(':collegeName', $collegeName);
        $stmt->bindParam(':roomType', $roomType);
        $stmt->bindParam(':appStatus', $appStatus);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        //check if insert was successful, otherwise return 400, with error message
        if ($count == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to create new application'), 400);
        }
        //else return , with success message
        $data = array(
            'status' => 'success',
            'message' => 'Application successfully added',
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

//update collegeapp by id
$app->put('/collegeapps/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $input = $request->getParsedBody();
    // $input = json_decode($request->getBody());
    $sql = "UPDATE collegeapp SET appStatus = :appStatus WHERE appId = :id";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':appStatus', $input['appStatus']);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        if($count == 0){
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to update application'), 400);
        }
        $data = array(
            'status' => 'success',
            'message' => 'Application successfully update',
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

//delete collegeapp by id
$app->delete('/collegeapps/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "DELETE FROM collegeapp WHERE appId = '$id'";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        //no app is deleted, thus, return 404
        if ($count == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'There is no app exist for the current Id'), 404);
        }
        $data = array(
            'status' => 'success',
            'message' => 'Application successfully delete',
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
