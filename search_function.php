<?php
include('server/connection.php');

if (isset($_POST['search'])) {
    $category = $_POST['category'];
    $price = $_POST['price'];

    // Retrieve search keyword
    $search_keyword = isset($_POST['search_keyword']) ? '%' . $_POST['search_keyword'] . '%' : '';

    // Prepare the count query
    $count_query = "SELECT COUNT(*) As total_records FROM products WHERE product_category LIKE ? AND product_price <= ?";
    if (!empty($search_keyword)) {
        $count_query .= " AND product_name LIKE ?";
    }

    // Prepare statement and bind parameters for counting records
    $stmt = $conn->prepare($count_query);
    if (!empty($search_keyword)) {
        $stmt->bind_param("sds", $category_filter, $price, $search_keyword);
    } else {
        $stmt->bind_param("sd", $category_filter, $price);
    }
    
    // Execute the count query and fetch total records
    $stmt->execute();
    $stmt->bind_result($total_records);
    $stmt->store_result();
    $stmt->fetch();

    // Prepare the products retrieval query
    $products_query = "SELECT * FROM products WHERE product_category LIKE ? AND product_price <= ?";
    if (!empty($search_keyword)) {
        $products_query .= " AND product_name LIKE ?";
    }
    $products_query .= " LIMIT ?, ?";

    // Prepare statement and bind parameters for retrieving products
    $stmt2 = $conn->prepare($products_query);
    if (!empty($search_keyword)) {
        $stmt2->bind_param("sdsii", $category_filter, $price, $search_keyword, $offset, $total_records_per_page);
    } else {
        $stmt2->bind_param("sdii", $category_filter, $price, $offset, $total_records_per_page);
    }

    // Execute the products retrieval query
    $stmt2->execute();
    $products = $stmt2->get_result();
}
?>