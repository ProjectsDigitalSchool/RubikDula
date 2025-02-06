<?php

session_start();

include('connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: ../checkout.php?message=Please Login or Register to place the order');
    exit;
}else{

if (isset($_POST['place_order'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "not paid";
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s');
    echo $order_status;
    echo $name;
    echo $email;
    echo $email;
    echo $city;
    echo $order_cost;
    $_SESSION['order_status'] = $order_status;

    $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date)
                    VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;
        echo $order_id;
        foreach ($_SESSION['cart'] as $product) {
            // Check if product_id is set and not null
            if (isset($product['product_id']) && $product['product_id'] !== null) {
                $product_id = $product['product_id'];
                $product_name = isset($product['product_name']) ? $product['product_name'] : null;
                $product_price = isset($product['product_price']) ? $product['product_price'] : null;
                $product_image = isset($product['product_image']) ? $product['product_image'] : null;
                $product_quantity = isset($product['product_quantity']) ? $product['product_quantity'] : null;

                $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);

                if (!$stmt1->execute()) {
                    // Handle errors if the order_items insertion fails
                    echo "Error inserting order items: " . $stmt1->error;
                }
            } else {
                echo "Error: product_id is not set or is null for a product in the cart.";
            }
        }
        header('location: ../payment.php?order_id=' . $order_id);

        //echo "Order placed successfully. Order ID: " . $order_id;
    }

    unset($_SESSION['cart']);
    exit();
} else {
    // Handle if 'place_order' is not set
}

}


?>

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