<?php include('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $contact_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->bind_param('i', $contact_id);
    $stmt->execute();
    $contact = $stmt->get_result();  // Correct variable name
} elseif (isset($_POST['edit_btn'])) {
    // Debugging - Output received form values
    var_dump($_POST);

    $contact_status = $_POST['status'];
    $contact_response = $_POST['contact_respond'];
    $contact_id = $_POST['id'];
    $stmt = $conn->prepare("UPDATE contacts SET status = ?, contact_respond = ? WHERE id = ?");
    $stmt->bind_param('ssi', $contact_status, $contact_response, $contact_id);

    if ($stmt->execute()) {
        header('location: contact_messages.php?contact_updated=Contact has been updated successfully');
        exit();
    } else {
        // Debugging - Output SQL error
        echo "SQL Error: " . $stmt->error;
        // Redirect with an error message
        header('location: contact_messages.php?contact_failed=' . urlencode($stmt->error));
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

            <h2>Edit Contact</h2>
            <div class="table-responsive">
                <div class="mx-auto container">
                    <form id="edit-order-form" method="POST" action="edit_contact.php">
                        <p style="color: red;" class="text-center">
                            <?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            } ?>
                        </p>
                        <?php foreach ($contact as $r) { ?>
                            <div class="form-group my-3">
                                <label>ContactId</label>
                                <p class="my-4"><?php echo $r['id']; ?></p>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $r['id'] ?>">

                            <div class="form-group my-3">
                                <label>Order Status</label>
                                <select class="form-select" required name="status">
                                    <option value="not dealt" <?php if ($r['status'] == 'not_dealt') {
                                        echo "selected";
                                    } ?>>Not Dealt
                                    </option>
                                    <option value="dealt" <?php if ($r['status'] == 'dealt') {
                                        echo "selected";
                                    } ?>>Dealt
                                    </option>
                                    <option value="processing" <?php if ($r['status'] == 'processing') {
                                        echo "selected";
                                    } ?>>Processing
                                    </option>
                                    <option value="processed" <?php if ($r['status'] == 'processed') {
                                        echo "selected";
                                    } ?>>Processed
                                    </option>
                                </select>
                            </div>
                            
                            <div class="form-group my-3">
                                <label>Contact Message</label>
                                <p class="my-4"><?php echo $r['message']; ?></p>
                            </div>

                            <div class="form-group my-3">
                                <label>Contact Response</label>
                                <textarea class="form-control" name="contact_respond" rows="5"><?php echo $r['contact_respond']; ?></textarea>
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
