<?php
$servername = "localhost";
$dbname = "todo-app";
$dbuser = "root";
$dbpassword = "iamcerebro";
$dbport = 3306;

$dsn = "mysql:host=$servername;dbname=$dbname;port=$dbport;charset=utf8mb4";
$attr = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
);

try {
    $connection = new PDO($dsn, $dbuser, $dbpassword, $attr);
} catch (PDOException $e) {
    echo $e->getMessage();
}