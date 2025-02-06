<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('server/connection.php');

if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id']; 
    $order_status = $_POST['order_status'];
    $order_cost = $_POST['order_cost'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $order_details = array();
    while ($row = $result->fetch_assoc()) {
        $order_details[] = $row;
    }

    $order_total_price = calculateTotalOrderPrice($order_details);
} else {
    header('location: account.php');
    exit;
}

function calculateTotalOrderPrice($order_details) {
    $total = 0;
    foreach ($order_details as $row) {
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
        $total += ($product_price * $product_quantity);
    }
    return $total;
}

?>

<?php include('header.php');?>

<section id="order" class="orders container my-5 py-3">
    <div class="orders-2 container">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">
    </div>

    <table class="orders mt-5 pt-5 mx-auto">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>ML</th>
            <th>Pay</th>
        </tr>

        <?php foreach($order_details as $row) { ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $row['product_image'];?>" width="75px">
                        <div>
                            <p class="mt-3"><?php echo $row['product_name'];?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <span>$<?php echo $row['product_price'];?></span>
                </td>
                <td>
                    <span><?php echo $row['product_quantity'];?></span>
                </td>
                <td>
                    <span><?php echo $row['product_ml'];?></span>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php if ($order_status == "not paid") { ?>
        <form style="float: right;" method="POST" action="orderLogic.php">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input type="hidden" name="order_cost" value="<?php echo $order_cost; ?>">
            <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
            <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now">
        </form>
    <?php } ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>