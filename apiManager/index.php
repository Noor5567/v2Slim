<?php
session_start();
require 'vendor/autoload.php';
require_once "../message.php";
$msg = new message();
$app = new \Slim\Slim();
$app->get('/getSabyTable', 'getSabyTable');
$app->post('/loginFunction', 'loginFunction');
$app->post('/register', 'register');
$app->run();

function getDb()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=cc", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
function getDb2()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=test", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
function loginfunction()
{
    $msg = new message();
    if (isset($_POST['do_login'])) {
        try {
            $db = getDb2();
            $name = $_POST['user_name'];
            $pass = $_POST['password'];
            $Query = "SELECT * from test where name='$name' and password='$pass'";
            $fetchQuery = $db->prepare($Query);
            $fetchQuery->execute();
            $result = $fetchQuery->fetch(PDO::FETCH_ASSOC);
            print_r($result);
            $_SESSION['user_name'] = $result['name'];
            echo "success";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        echo $msg->showmessage("danger", "Can Not Login");
    }
}
function register()
{
    $msg = new message();
    if (isset($_POST['register'])) {
        try {
            $db = getDb2();
            $name = $_POST['user_name'];
            $pass = $_POST['password'];
            $query = "insert into test (name,password) VALUES (:name,:password)";
            $stmt = $db->prepare($query);
            $stmt->execute(['name' => $name, 'password' => $pass]);
        } catch (PDOException $e) {
            restError($e->getMessage());
        }
    } else {
        echo $msg->showmessage("warining", "something wrong");
    }
}
function getSabyTable()
{
    try {
        $db = getDb();
        $Query = "SELECT id,saby,server from saby_list limit 3";
        $fetchQuery = $db->prepare($Query);
        $fetchQuery->execute();
        $result = $fetchQuery->fetchAll(PDO::FETCH_ASSOC);
        // $return['data'] =  $result;
        echo json_encode(array('data' => $result)); // because the data come from database in array form 
    } catch (Exception $e) {
        restError($e->getMessage());
    }
}
function restError($error)
{
    echo '{"error":{"text":' . $error . '}}';
    unset($error);
}
