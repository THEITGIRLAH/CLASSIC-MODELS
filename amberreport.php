<?php //Amber Harris
require_once "connect.php";
try{
//prepare
$sql = "SELECT * FROM `orders` JOIN orderdetails USING (orderNumber) WHERE orderNumber = 10104";
$stmt = $conn->prepare($sql);
//execute 
$stmt->execute();
$result = $stmt->fetchAll();

if ($stmt->rowCount() > 0) {
    echo '<table style="border: 1px solid black; border-collapse: collapse;">';
    echo '<tr>';
    echo '<th style="border: 1px solid black;">Order Number</th>';
    echo '<th style="border: 1px solid black;">Order Date</th>';
    echo '<th style="border: 1px solid black;">Quantity Ordered</th>';
    echo '<th style="border: 1px solid black;">Status</th>';


    echo '</tr>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td style="border: 1px solid black;">' . $row['orderNumber'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['orderDate'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['quantityOrdered'] . '</td>';
        echo '<td style="border: 1px solid black;">' . $row['status'] . '</td>';
    
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