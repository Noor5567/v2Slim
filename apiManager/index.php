<?php
session_start();
require 'vendor/autoload.php';
$app = new \Slim\Slim();
$app->get('/go', 'indexFun');
$app->get('/getSabyTable', 'getSabyTable');
$app->post('/loginFunction', 'loginFunction');
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
function loginfunction()
{
    if (isset($_POST['do_login'])) {
        try {
            $db = getDb();
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
        echo "fail";
    }
}

function getSabyTable()
{
    try {
        $db = getDb();
        $Query = "SELECT id,saby,server from saby_list";
        $fetchQuery = $db->prepare($Query);
        $fetchQuery->execute();
        $result = $fetchQuery->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (Exception $e) {
        restError($e->getMessage());
    }
}
function restError($error)
{
    echo '{"error":{"text":' . $error . '}}';
    unset($error);
}


function indexFun()
{
    echo "Go Along";
}
