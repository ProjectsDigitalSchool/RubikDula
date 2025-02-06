<?php
include('../server/connection.php');

if(isset($_POST['create_product'])){
    $product_name = $_POST['title']; // Changed from 'name' to 'title'
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];
    $product_stock = $_POST['stock'];

    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];
    $file_name = $_FILES['image1']['name'];

    $image_name1 = $product_name."1.jpeg";
    $image_name2 = $product_name."2.jpeg";
    $image_name3 = $product_name."3.jpeg";
    $image_name4 = $product_name."4.jpeg";

    move_uploaded_file($image1,"../assets/imgs/".$image_name1);
    move_uploaded_file($image2,"../assets/imgs/".$image_name2);
    move_uploaded_file($image3,"../assets/imgs/".$image_name3);
    move_uploaded_file($image4,"../assets/imgs/".$image_name4);

    $stmt = $conn->prepare("INSERT INTO products( product_name, product_category,product_description, product_image, product_image2, product_image3, product_image4, product_price, product_stock, product_special_offer) VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param('ssssssssss', $product_name, $product_category, $product_description, $image_name1, $image_name2, $image_name3, $image_name4, $product_price, $product_stock, $product_special_offer);

    if ($stmt->execute()) {
        header('location: products.php?product_created=Product has been created successfully');
    } else {
        header('location: products.php?product_failed= Product Failed To Create');
        exit();
    }
}
?>