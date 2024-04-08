<?php
require_once '../../middleware/client_login.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

require_once '../../controller/client/product_detail.php';

if (!isset($_SESSION['cart_detail'])) {
    $_SESSION['cart_detail'] = [];
}

if ($id) {
    $data = [
        'id' => $id,
        'name' => $product_detail[0]['name'],
        'image' => $product_detail[0]['image'],
        'quantity' => 1,
        'price' => $product_detail[0]['price']
    ];

    $itemExists = false;

    for ($i = 0; $i < count($_SESSION['cart_detail']); $i++) {
        if ($_SESSION['cart_detail'][$i]['id'] == $id) {
            $_SESSION['cart_detail'][$i]['quantity']++;
            $itemExists = true;
            break;
        }
    }

    if (!$itemExists) {
        array_push($_SESSION['cart_detail'], $data);
    }

    // unset($_SESSION['cart_detail']);
}

?>

<!-- Your HTML code -->
<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <!-- Shopping Cart -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>

                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">

                        <!-- Display Cart Items -->
                        <?php foreach ($_SESSION['cart_detail'] as $cart_detail) { ?>
                            <br>
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="../../uploads/product/<?= $cart_detail['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2"><?= $cart_detail['name'] ?></p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2" onclick="decreaseQuantity(<?= $cart_detail['id'] ?>)">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="<?= $cart_detail['quantity'] ?>" type="text" class="form-control form-control-sm m-lg-2 p-lg-2" />

                                    <button class="btn btn-link px-2" onclick="increaseQuantity(<?= $cart_detail['id'] ?>)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0"><?= number_format($cart_detail['quantity'] * $cart_detail['price'], 0, '', '.') ?> VND
                                    </h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="" class="text-danger" onclick="removeItem(<?= $cart_detail['id'] ?>)">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <!-- Proceed to Pay Button -->
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning btn-block btn-lg" onclick="proceedToPay()">Proceed to Pay</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- JavaScript functions for handling cart operations -->
<script>
    function decreaseQuantity(itemId) {
        // Implement logic to decrease quantity for the item with the given itemId
    }

    function increaseQuantity(itemId) {
        // Implement logic to increase quantity for the item with the given itemId
    }

    function removeItem(itemId) {

    }

    function proceedToPay() {
        window.location.href = "./master.php?pages=credit";
    }
</script>