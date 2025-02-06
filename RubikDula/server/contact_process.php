<?php
include('connection.php'); // Include your database connection file
session_start(); // Start the session

$message_sent = false; // Variable to track message status

if(!isset($_SESSION['logged_in'])){
    header('location: ../contact.php?message=Please Login or Register to submit this');
    exit;
}else{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Check if user is logged in and get user_id from session
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        // Insert data into the 'contacts' table
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $subject, $message, $user_id);

        if ($stmt->execute()) {
            // Insertion successful
            $message_sent = true; // Set message status to true
        } else {
            // Insertion failed
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        header('location: ../contact.php?messagegood=Message sent successfully');
    } else {
        // User is not logged in
        echo "User is not logged in!";
    }

    $conn->close();
}
}
?>