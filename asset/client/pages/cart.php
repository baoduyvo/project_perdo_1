<?php
require_once '../../middleware/client_login.php';

$id = $_GET['id'];

require_once '../../controller/client/product_detail.php';

if (!isset($_SESSION['cart_detail'])) {
    $_SESSION['cart_detail'] = [];
}
$data = [
    'id' => $id,
    'name' => $product_detail[0]['name'],
    'image' => $product_detail[0]['image'],
    'quantity' => 1,
    'price' => $product_detail[0]['price']
];


array_push($_SESSION['cart_detail'], $data);

?>

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>

                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">

                        <?php
                        $cart_detail = reset($_SESSION['cart_detail']);
                        while ($cart_detail !== false) {
                        ?>
                            <br>
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="../../uploads/product/<?= $cart_detail['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2"><?= $cart_detail['name'] ?></p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="<?= $cart_detail['quantity'] ?>" type="text" class="form-control form-control-sm m-lg-2 p-lg-2" />

                                    <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0"><?= number_format($cart_detail['quantity'] * $cart_detail['price'], 0, '', '.') ?> VND
                                    </h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        <?php
                            $cart_detail = next($_SESSION['cart_detail']);
                        }
                        ?>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>