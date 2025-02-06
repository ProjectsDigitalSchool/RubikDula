<?php

session_start();

if (isset($_POST['order_pay_btn'])) {
$order_id = $_POST['order_id'];
$_SESSION['total'] = $_POST['order_cost'];
header('location: payment.php?order_id=' . $order_id);

}

?>