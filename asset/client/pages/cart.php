<?php
require_once '../../middleware/client_login.php';

require_once '../../controller/client/show_cart_detail.php';

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
                        <?php if (empty($cart_details)) { ?>
                            <p>No Product</p>
                        <?php } ?>

                        <?php foreach ($cart_details as $key => $cart_detail) { ?>
                            <br>
                            <div class="row d-flex justify-content-between align-items-center" data-productID="">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="../../uploads/product/<?= $cart_detail['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2"><?= $cart_detail['product_name'] ?></p>
                                </div>
                                <form method="POST" action="../../controller/client/update_quantity.php?id=<?= $cart_detail['id'] ?>" class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button type="button" class="btn btn-link px-2" onclick="decreaseQuantity(<?= $cart_detail['id'] ?>,<?= $cart_detail['quantity'] ?>)">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" require name="quantity" value="<?= $cart_detail['quantity'] ?>" type="text" class="form-control form-control-sm m-lg-2 p-lg-2" />
                                    <input type="submit" value="" hidden>
                                    <button type="button" class="btn btn-link px-2" onclick="increaseQuantity(<?= $cart_detail['id'] ?>,<?= $cart_detail['quantity'] ?>)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0"><?= number_format($cart_detail['quantity'] * $cart_detail['price'], 0, '', '.') ?> VND
                                    </h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <button type="button" class="btn btn-danger px-2" onclick="removeItem(<?= $cart_detail['id'] ?>)">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning btn-block btn-lg" onclick="proceedToPay()">Proceed to Pay</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<script>
    function decreaseQuantity(itemId, quantity) {
        $.ajax({
            type: "POST",
            url: "../../function/decreaseQuantity.php",
            data: {
                action: "decrease",
                itemId: itemId,
                quantity: quantity
            },
            success: function(response) {
                updateCart(response);
            }
        });
    }

    function increaseQuantity(itemId, quantity) {
        $.ajax({
            type: "POST",
            url: "../../function/increaseQuantity.php",
            data: {
                action: "increase",
                itemId: itemId,
                quantity: quantity
            },
            success: function(response) {
                updateCart(response);
            }
        });
    }

    function removeItem(itemId) {
        $.ajax({
            type: "POST",
            url: "../../function/removeItem.php",
            data: {
                action: "remove",
                itemId: itemId
            },
            success: function(response) {
                updateCart(response);
            }
        });
    }

    function updateCart(response) {
        location.reload();
    }

    function proceedToPay() {
        window.location.href = "./master.php?pages=credit";
    }
</script>