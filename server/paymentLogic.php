<?php
include('connection.php');
session_start();

function removeStock($conn, $orderId) {
    $sql = "SELECT * FROM order_items WHERE order_id = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId); 

    // Execute query
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {

        $productId = $row['product_id'];
        $quantity = $row['product_quantity'];


        $updateSql = "UPDATE products SET product_stock = product_stock - ? WHERE product_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ii", $quantity, $productId);
        $updateStmt->execute();
        $updateStmt->close();
    }
    $stmt->close();
}

if (isset($_POST['order_pay_btn'])) {
    $order_status = "paid";
    $orderId = $_POST['order_id'];
    echo $orderId;


    $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $order_status, $orderId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {

            removeStock($conn, $orderId);

            unset($_SESSION['cart']);
            header("Location: ../account.php");
            exit();
        } else {
            echo "Failed to update order statuss.";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the statement.";
    }
} else {
    echo "Failed to update order status.";
}
?>