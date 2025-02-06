<?php

session_start();

include('../server/connection.php');

?>

<?php
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit();
}

if(isset($_GET['id'])){
    $contact_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id=?");
    $stmt->bind_param('i', $contact_id);
    
    if($stmt->execute()){

    header('location: contact_messages.php?deleted_successfully= Contact has been deleted successfully');
    }else{
        header('location: contact_messages.php?deleted_failure= Could Not delete Contact');
    }

}

?>