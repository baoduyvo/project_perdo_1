<?php
require_once '../../controller/admin/cart/select.php';
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Timeline</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="timeline">
                    <?php if (empty($groupedCarts)) { ?>
                        <div>
                            <div class="timeline-item">
                                <div class="timeline-body">
                                    <div class="card-body p-1">
                                        <div class="row d-flex justify-content-between align-items-center" data-productid="">
                                            <span class="lead fw-normal mb-1" style="font-size: 1.4em;">&nbsp;&nbsp;&nbsp;No shopping cart yet </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach ($groupedCarts as $cart) { ?>
                        <div>
                            <i class="fas fa-shopping-cart bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp; <?= date('d-m-Y', strtotime($cart['created_at'])) ?></span>
                                <h3 class="timeline-header">
                                    <a href="#">Email: </a>
                                    <span><?= $cart['email'] ?></span>
                                </h3>
                                <div class="timeline-body">
                                    <div class="card-body p-1">
                                        <div class="row d-flex justify-content-between align-items-center" data-productid="">
                                            <span class="lead fw-normal mb-1" style="font-size: 1.2em;">Full Name: <?= $cart['full_name'] ?></span>
                                            <span class="lead fw-normal mb-1" style="font-size: 1.2em;">Phone: <?= $cart['phone'] ?></span>
                                            <span class="lead fw-normal mb-1" style="font-size: 1.2em;">Address: <?= $cart['address'] ?></span>
                                            <span class="lead fw-normal mb-1" style="font-size: 1.2em;">Total: <?= number_format($cart['cart_total'], 0, '', '.') ?> VND</span>
                                        </div>
                                        <div class="row mt-3 ml-1 mr-1">
                                            <table class="table" border="1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">id</th>
                                                        <th scope="col" class="text-center">Image</th>
                                                        <th scope="col" class="text-center">Name</th>
                                                        <th scope="col" class="text-center">Quantity</th>
                                                        <th scope="col" class="text-center">Price</th>
                                                        <th scope="col" class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cart['cart_details'] as $key => $detail) { ?>
                                                        <tr>
                                                            <td scope="row" class="text-center"><?= $key + 1 ?></td>
                                                            <td class="text-center">
                                                                <img src="../../uploads/product/<?= $detail['image'] ?>" alt="" style="height: 40px; width: 40px;">
                                                            </td>
                                                            <td class="text-center"><?= $detail['product_name'] ?></td>
                                                            <td class="text-center"><?= $detail['quantity'] ?></td>
                                                            <td class="text-center"><?= number_format($detail['price'], 0, '', '.') ?> VND</td>
                                                            <td class="text-center"><?= number_format($detail['price'] * $detail['quantity'], 0, '', '.') ?> VND</td>
                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    <button class="btn btn-primary btn-sm" onclick="downloadCSV(<?= $cart['id'] ?>)">
                                        Accept
                                    </button>
                                    <a class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function downloadCSV(id) {
        window.location.href = 'http://localhost/project_perdo_1/controller/admin/cart/export.php?cart_id=' + id;
    }
</script>