<?php
// Include database connection logic
include('server/connection.php');

function removeStock($conn, $orderId) {
    // Assuming your order items are stored in a table called 'order_items'
    // You'll need to adjust this query according to your database schema
    $sql = "SELECT * FROM order_items WHERE order_id = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId); // Assuming the order ID is an integer

    // Execute query
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Update the stock quantity in your 'products' table
        // Here, reduce the product quantity based on the items purchased
        $productId = $row['product_id'];
        $quantity = $row['product_quantity'];

        // Example query to update the stock
        $updateSql = "UPDATE products SET product_stock = product_stock - ? WHERE product_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ii", $quantity, $productId);
        $updateStmt->execute();
        $updateStmt->close();
    }
    $stmt->close();
}

// Pass the $conn variable representing the database connection

?>
