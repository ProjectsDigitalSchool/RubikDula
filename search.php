<?php
include('server/connection.php');

if (isset($_POST['search'])) {
    $search_keyword = $_POST['search_keyword'];
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    $sql = "SELECT * FROM products WHERE (product_name LIKE ? OR product_description LIKE ?)";
    $params = array("%$search_keyword%", "%$search_keyword%");

    if (!empty($category)) {
        $sql .= " AND product_category = ?";
        $params[] = $category;
    }

    if (!empty($price)) {
        $sql .= " AND product_price <= ?";
        $params[] = $price;
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);

    // Execute the search query
    $stmt->execute();
    $products = $stmt->get_result();

    // Redirect back to shop.php with search results
    header("Location: shop.php?search=success");
    exit();
} else {
    // Redirect back to shop.php if search form not submitted
    header("Location: shop.php");
    exit();
}
?>