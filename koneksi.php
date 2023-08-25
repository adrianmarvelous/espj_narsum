<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "espj_narsum";
try {
    $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception){
    die("Connection error: ".$exception->getMessage());
}
require_once("library.php");
require_once("ClassLogin.php");
$login = new Login();
?>
