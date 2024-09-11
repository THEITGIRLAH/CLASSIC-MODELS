<?php
//johnnySoriano
require_once "connect.php";

$sql = "SELECT * FROM customers JOIN payments ON customers.customerNumber = payments.customerNumber WHERE customers.customerNumber = '103'";

try {
    $stmt = $conn->query($sql);

    if ($stmt->rowCount() > 0) {
      
        echo "<table border='1'>";
        echo "<tr><th>Customer Number</th><th>Customer Name</th><th>Contact Last Name</th><th>Contact First Name</th><th>Phone</th><th>Address Line 1</th><th>Address Line 2</th><th>City</th><th>State</th><th>Postal Code</th><th>Country</th><th>Sales Rep Employee Number</th><th>Credit Limit</th><th>Check Number</th><th>Payment Date</th><th>Amount</th></tr>";
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["customerNumber"] . "</td>";
            echo "<td>" . $row["customerName"] . "</td>";
            echo "<td>" . $row["contactLastName"] . "</td>";
            echo "<td>" . $row["contactFirstName"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["addressLine1"] . "</td>";
            echo "<td>" . $row["addressLine2"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["state"] . "</td>";
            echo "<td>" . $row["postalCode"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["salesRepEmployeeNumber"] . "</td>";
            echo "<td>" . $row["creditLimit"] . "</td>";
            echo "<td>" . $row["checkNumber"] . "</td>";
            echo "<td>" . $row["paymentDate"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$conn = null;
?> 