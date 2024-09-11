<?php
require_once "connect.php";
$employeeNumber= $_POST['employeeNumber'];

try{
//prepare
$sql = "SELECT lastName, firstName, extension, email, officeCode, reportsTo, jobTitle FROM employees WHERE employeeNumber = :employeeNumber";
$stmt = $conn->prepare($sql);
//bind
$stmt->bindParam(':employeeNumber', $employeeNumber);
//execute 
$stmt->execute();
$result = $stmt->fetchAll();

if ($stmt->rowCount() > 0) {
    echo '<table style="border: 1px solid black; border-collapse: collapse;">';
    echo '<tr>';
    echo '<th style="border: 1px solid black;">First Name</th>';
    echo '<th style="border: 1px solid black;">Last Name</th>';
    echo '<th style="border: 1px solid black;">Extension</th>';
    echo '<th style="border: 1px solid black;">Email</th>';
    echo '<th style="border: 1px solid black;">Office Code</th>';
    echo '<th style="border: 1px solid black;">Reports To</th>';
    echo '<th style="border: 1px solid black;">Job Title</th>';
  
    echo '</tr>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td style="border: 1px solid black;">' . $row['firstName'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['lastName'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['extension'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['email'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['officeCode'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['reportsTo'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['jobTitle'] . '</td>';

        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No results found.';
}
}

catch(PDOException $e){
    echo "Failed" .$e->getMessage();
}
$conn = null;
//
?>