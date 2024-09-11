<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "wwhite9_classicmodels";
$charset = "utf8mb4";

$dsn = "mysql:host=$host; dbname=$db;charset=$charset";

// sets up options for PDO
$options = [
  PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES    => false,
];

// connect to the database, or at least try to
try{
    $conn = new PDO($dsn, $username, $password, $options);
    //echo "Successfully connected!";
}catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}
?>