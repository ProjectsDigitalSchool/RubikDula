<?php include('header.php'); ?>

<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result();
} elseif (isset($_POST['edit_btn'])) {
    // Debugging - Output received form values
    var_dump($_POST);

    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
    $stmt->bind_param('si', $order_status, $order_id);

    if ($stmt->execute()) {
        header('location: index.php?order_updated=Order has been updated successfully');
        exit();
    } else {
        // Debugging - Output SQL error
        echo "SQL Error: " . $stmt->error;
        // Redirect with an error message
        header('location: products.php?order_failed=' . urlencode($stmt->error));
        exit();
    }
} else {
    header('location: index.php');
    exit();
}
?>

<div class="container-fluid">
    <div class="row">
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <h2>Edit Order</h2>
            <div class="table-responsive">
                <div class="mx-auto container">
                    <form id="edit-order-form" method="POST" action="edit_order.php">
                        <p style="color: red;" class="text-center">
                            <?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            } ?>
                        </p>
                        <?php foreach ($order as $r) { ?>
                            <div class="form-group my-3">
                                <label>OrderId</label>
                                <p class="my-4"><?php echo $r['order_id']; ?></p>
                            </div>
                            <div class="form-group mt-3">
                                <label>OrderPrice</label>
                                <p class="my-4"><?php echo $r['order_cost']; ?></p>
                            </div>

                            <input type="hidden" name="order_id" value="<?php echo $r['order_id'] ?>">

                            <div class="form-group my-3">
                                <label>Order Status</label>
                                <select class="form-select" required name="order_status">
                                    <option value="not paid" <?php if ($r['order_status'] == 'not_paid') {
                                        echo "selected";
                                    } ?>>Not paid
                                    </option>
                                    <option value="paid" <?php if ($r['order_status'] == 'paid') {
                                        echo "selected";
                                    } ?>>Paid
                                    </option>
                                    <option value="shipped" <?php if ($r['order_status'] == 'shipped') {
                                        echo "selected";
                                    } ?>>Shipped
                                    </option>
                                    <option value="delivered" <?php if ($r['order_status'] == 'delivered') {
                                        echo "selected";
                                    } ?>>Delivered
                                    </option>
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <label>OrderDate</label>
                                <p class="my-4"><?php echo $r['order_date']; ?></p>
                            </div>
                            <div class="forms-group mt-3">
                                <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit">
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>
