<?php
require_once "connect.php";

$employeeNumber= $_POST['employeeNumber'];
$lastName= $_POST['lastName'];
$firstName= $_POST['firstName'];
$extension= $_POST['extension'];
$email= $_POST['email'];
$officeCode= $_POST['officeCode'];
$reportsTo= $_POST['reportsTo'];
$jobTitle= $_POST['jobTitle'];

try{
$sql = "INSERT INTO employees VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :reportsTo, :jobTitle)";
$stmt= $conn->prepare($sql);

$stmt->bindParam(':employeeNumber', $employeeNumber);
$stmt->bindParam(':lastName', $lastName);
$stmt->bindParam(':firstName', $firstName);
$stmt->bindParam(':extension', $extension);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':officeCode', $officeCode);
$stmt->bindParam(':reportsTo', $reportsTo);
$stmt->bindParam(':jobTitle', $jobTitle);

$stmt->execute();
echo "Row inserted successfully!";
}

catch(PDOException $e){
echo "Failed" .$e->getMessage();
}


$conn = null;
//
?>
