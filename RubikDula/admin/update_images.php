<?php
include('../server/connection.php');
echo "test";

if (isset($_POST['update_images'])) {
    $product_id = $_POST['product_id'];
    $target_dir = "../assets/imgs/"; 

    $images = [];
    for ($i = 1; $i <= 4; $i++) {
        $image_field_name = 'image' . $i;
        if (isset($_FILES[$image_field_name]) && $_FILES[$image_field_name]['error'] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$image_field_name]['tmp_name'];
            $name = basename($_FILES[$image_field_name]['name']);
            move_uploaded_file($tmp_name, $target_dir . $name);
            $images[] = $name;
        } else {
            $images[] = null; 
        }
    }


    $sql = "UPDATE products SET product_image=?, product_image2 = ?, product_image3 = ?, product_image4 = ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $images[0], $images[1], $images[2], $images[3], $product_id);

    if ($stmt->execute()) {
        header('location: products.php?images_updated=Image has been Updated successfully');
    } else {
        header('location: products.php?images_failed= Image Failed To Update');
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>