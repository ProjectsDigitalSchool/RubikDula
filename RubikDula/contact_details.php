<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('server/connection.php');

if (isset($_POST['contact_details_btn']) && isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];

    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->bind_param('i', $contact_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $contact_details = $result->fetch_assoc(); 
} else {
    header('location: account.php');
    exit;
}

?>

<style>
.message-container {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.message-subject h3 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
}

.message-content p {
    font-size: 16px;
    line-height: 1.6;
}

.message-details p {
    font-size: 14px;
    color: #666;
}
</style>

<?php include('header.php'); ?>

<section id="order" class="orders container my-5 py-3">
    <div class="orders-2 container">
        <h2 class="font-weight-bold text-center">Contact Messages</h2>
        <hr class="mx-auto">
    </div>

    <div class="message-container mt-5">
        <div class="message-subject">
            <h3><?php echo $contact_details['subject']; ?></h3>
        </div>
        <div class="message-content">
            <p><?php echo $contact_details['message']; ?></p>
        </div>
        <div class="message-details">
            <p>Status: <?php echo $contact_details['status']; ?></p>
            <p>Response: <?php echo $contact_details['contact_respond']; ?></p>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
