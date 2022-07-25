<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

class db{
        // Properties
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $dbname = 'myproject';

        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->host;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->user, $this->password);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

try {
    $sql = "INSERT INTO user (name,id,email) VALUES (:name,:id,:email)";
    $db = new db();
    // Connect
    $db = $db->connect();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':email', $email);

    $stmt->execute();
    $count = $stmt->rowCount();
    $db = null;

    $data = array(
        "status" => "success",
        "rowcount" =>$count
    );
    echo json_encode($data);
} catch (PDOException $e) {
    $data = array(
        "status" => "fail"
    );
    echo json_encode($data);
}

?>