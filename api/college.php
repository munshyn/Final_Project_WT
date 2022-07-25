<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//return json object of all college
$app->get('/colleges', function (Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM college";
    try {
        //get the db object
        $db = new db();
        //connect
        $db  = $db->connect();

        $stmt = $db->query($sql);
        $college = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db  = null;
        $data = array(
            'status' => 'Success',
            'message' => 'Colleges found',
            'college' => $college,
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


//get single college by id
$app->get('/colleges/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "SELECT * FROM college WHERE collegeId = '$id'";
    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $college = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        //check if college exist or not, otherwise return 200, with error message
        if (count($college) == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'College not found'), 404);
        }
        //else return 200, with user data
        $data = array(
            'status' => 'Success',
            'message' => 'College found',
            'college' => $college,
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

//add a new college
$app->post('/colleges', function (Request $request, Response $response, array $args) {
    $collegeName = $_POST['collegeName'];
    $occupied = $_POST['occupied'];
    $availability = $_POST['availability'];

    $sql = "INSERT INTO college (collegeName, occupied, availability) VALUES (:collegeName, :occupied, :availability)";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':collegeName', $collegeName);
        $stmt->bindParam(':occupied', $occupied);
        $stmt->bindParam(':availability', $availability);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        //check if insert was successful, otherwise return 400, with error message
        if ($count == 0) {
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to create new college'), 400);
        }
        //else return , with success message
        $data = array(
            'status' => 'success',
            'message' => 'College successfully added',
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

//update college by id
$app->put('/colleges/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    // $input = $request->getParsedBody();
    // $input = json_decode($request->getBody());
    $sql = "UPDATE college SET occupied = occupied+1, availability = availability-1 WHERE collegeId = '$id'";

    try {
        //get the db object
        $db = new db();
        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        // $stmt->bindParam(':id', $id);
        // $stmt->bindParam(':appStatus', $input['appStatus']);
        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;
        if($count == 0){
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'Failed to update college'), 400);
        }
        $data = array(
            'status' => 'success',
            'message' => 'College successfully update',
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
$app->delete('/colleges/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $sql = "DELETE FROM college WHERE collegeId = '$id'";

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
            return $response->withJson(array('status' => 'Unsuccessful', 'message' => 'There is no college exist for the current Id'), 404);
        }
        $data = array(
            'status' => 'success',
            'message' => 'College successfully delete',
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
