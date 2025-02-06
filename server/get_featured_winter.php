<?php

include('connection.php');

// Replace 1, 2, and 3 with the specific product IDs you want to retrieve
$productIds = [13, 9, 11, 4];

// Create a parameterized query with placeholders based on the number of product IDs
$placeholders = implode(',', array_fill(0, count($productIds), '?'));

// Prepare the SQL query with the IN clause
$stmt = $conn->prepare("SELECT * FROM products WHERE product_id IN ($placeholders)");

// Bind the product IDs to the placeholders
$stmt->bind_param(str_repeat('i', count($productIds)), ...$productIds);

$stmt->execute();

$featured_products = $stmt->get_result();

?>