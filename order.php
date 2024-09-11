<?php
require_once "connect.php";

$OID = $_POST['OID'];
try {
    // Prepare
    $sql = "INSERT INTO orders VALUES (:OID)";
    $stmt = $conn->prepare($sql);

    // Bind
    $stmt->bindParam(':OID', $OID);

    // Execute
    $stmt->execute();

    echo "Insertion successful.";
} catch (PDOException $e) {
    echo "Failed: " . $e->getMessage();
}
?>