<?php 
include('header.php');
require_once('server/connection.php');

session_start(); 

function calculatePrice($basePrice, $mlQuantity) {
    $defaultPrice = $basePrice * 1; 
    $volumeFactor = 1.0; // Default factor for 50ml
    
    switch ($mlQuantity) {
        case '10':
            $volumeFactor = 0.15;
            break;
        case '25':
            $volumeFactor = 0.5;
            break;
        case '50':
            $volumeFactor = 1.0;
            break;
        case '75':
            $volumeFactor = 1.25;
            break;
        case '100':
            $volumeFactor = 1.5;
            break;
        default:
            $volumeFactor = 1.0;
    }

    return $basePrice * $volumeFactor;
}

function calculateTotalCart() {
    $total = 0;
    foreach($_SESSION['cart'] as $item) {
        $total += $item['product_price'] * $item['product_quantity'];
    }
    $_SESSION['total'] = $total;
}

if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $product_id = $_POST['product_id'];

    $products_array_ids = array_column($_SESSION['cart'], "product_id");
    if (!in_array($product_id, $products_array_ids)) {
        $stmt = $conn->prepare("SELECT product_price FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->bind_result($product_price);
        $stmt->fetch();
        $stmt->close();

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $_POST['product_name'],
            'product_price' => calculatePrice($product_price, $_POST['product_ml']),
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity'],
            'product_ml' => $_POST['product_ml'],
            'product_stock' => $_POST['product_stock']
        );

        $_SESSION['cart'][] = $product_array;
    } else {
        echo '<script>alert("Product already in cart");</script>';
    }

    calculateTotalCart();

} elseif (isset($_POST['remove_product'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['product_id'] == $_POST['product_id']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
                calculateTotalCart();
                break;
            }
        }
    }
} elseif (isset($_POST['edit_quantity'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => &$product) {
            if ($product['product_id'] == $_POST['product_id']) {
                $product['product_quantity'] = $_POST['product_quantity'];
                calculateTotalCart();
                break;
            }
        }
    }
}
?>


<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="Text font-weight-bolde">Your Cart</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        <?php if(!empty($_SESSION['cart'])): ?>
            <?php foreach($_SESSION['cart'] as $key => $value): ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image'];?>">
                        <div>
                            <p><?php echo $value['product_name'];?></p>
                            <small>Price: $<?php echo $value['product_price'];?></small>
                            <small>ml: <?php echo $value['product_ml'];?></small>
                            <br>
                            <form method="POST" action="">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                                <input type="submit" name="remove_product" class="remove-btn" value="remove">
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                        <p><?php echo $value['product_quantity'];?></p>
                        
                    </form>
                </td>
                <td>
                    $<?php echo $value['product_price'] * $value['product_quantity']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <div class="cart-total">
        <table>
            <tr>
                <td>Total</td>
                <td>$<?php echo isset($_SESSION['total']) ? $_SESSION['total'] : '0'; ?></td>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
        <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
        </form>
    </div>
</section>

<div><?php include('footer.php');?></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>