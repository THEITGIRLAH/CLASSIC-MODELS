<?php //Melissa Mendoza
require_once "connect.php";

try{
    //prepare
    $sql = "SELECT * FROM `customers` JOIN orders USING (customerNumber) WHERE customerNumber = 103";
    
    $stmt = $conn->prepare($sql);

    //execute 
    $stmt->execute();
    $result = $stmt->fetchAll();

    if($result){
        echo "<table><thead<tr><th>Customer Number</th><th>Customer Name</th></th><th>Order Number</th></th><th>Status</th></tr></thead><tbody>";
        foreach($result as $row){
            
            echo "<tr><td>".$row['customerNumber']."</td><td>".$row['customerName']."</td><td>".$row['orderNumber']."</td><td>".$row['status']."</td></tr>";
        }
    
        echo "</tbody></table>";
        }
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
$conn = null;
?>
