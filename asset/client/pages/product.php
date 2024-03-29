<?php
require_once '../../controller/client/list_product.php';
?>

<div class="product-bg">
    <div class="product-bg-white">
        <div class="container">
            <div class="row">

                <?php foreach ($products as $product) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="product-box">
                            <a href="#"><img src="../../uploads/product/<?= $product['image'] ?>" style="height: 200px;" /></a>
                            <h3><?= $product['name'] ?></h3>
                            <span><?= number_format($product['price'], 0, '', '.') ?> VND</span>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>