<?php //Willie White
require_once "connect.php";
try{
//prepare
$sql = "SELECT * FROM `employees` JOIN offices USING (officeCode) WHERE officeCode = 1";
$stmt = $conn->prepare($sql);
//execute 
$stmt->execute();
$result = $stmt->fetchAll();


if ($stmt->rowCount() > 0) {
    echo '<table style="border: 1px solid black; border-collapse: collapse;">';
    echo '<tr>';
    echo '<th style="border: 1px solid black;">Office Code</th>';
    echo '<th style="border: 1px solid black;">Employee Number</th>';
    echo '<th style="border: 1px solid black;">Last Name</th>';
    echo '<th style="border: 1px solid black;">First Name</th>';
    echo '<th style="border: 1px solid black;">Extension</th>';
    echo '<th style="border: 1px solid black;">Email</th>';
    echo '<th style="border: 1px solid black;">ReportsTo</th>';
    echo '<th style="border: 1px solid black;">Job Title</th>';
    echo '<th style="border: 1px solid black;">City</th>';
    echo '<th style="border: 1px solid black;">Phone</th>';
    echo '<th style="border: 1px solid black;">Address 1</th>';
    echo '<th style="border: 1px solid black;">Address 2</th>';
    echo '<th style="border: 1px solid black;">State</th>';
    echo '<th style="border: 1px solid black;">Country</th>';
    echo '<th style="border: 1px solid black;">Postal Code</th>';
    echo '<th style="border: 1px solid black;">Territory</th>';
    echo '</tr>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td style="border: 1px solid black;">' . $row['officeCode'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['employeeNumber'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['lastName'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['firstName'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['extension'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['email'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['reportsTo'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['jobTitle'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['city'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['phone'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['addressLine1'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['addressLine2'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['state'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['country'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['postalCode'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['territory'] . '</td>';
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