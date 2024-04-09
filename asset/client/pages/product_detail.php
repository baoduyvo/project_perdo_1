<?php

$id = $_GET['id'];

require_once '../../controller/client/product_detail.php';

?>

<div class="container">
    <div class="product-list">
        <div class="containerr">
            <div class="images">
                <img src="../../uploads/product/<?= $product_detail[0]['image'] ?>" style="height: 550px;" />
            </div>
            <form class="product" method="post" action="../../controller/client/cart_detail.php?product_id=<?= $id ?>">
                <p><?= $product_detail[0]['category_name'] ?></p>
                <h1><?= $product_detail[0]['name'] ?></h1>
                <h2><?= number_format($product_detail[0]['price'], 0, '', '.') ?> VND</h2>
                <p class="desc">
                    <?= $product_detail[0]['description']; ?>
                </p>
                <div class="col-md-6 col-lg-6 col-xl-4 d-flex justify-content-md-around align-items-center">
                    <button type="button" class="btn btn-link px-2" onclick="minus()">
                        <i class="fas fa-minus"></i>
                    </button>

                    <input min="1" name="quantity" value="1" type="text" class="form-control form-control-sm m-lg-2 p-lg-2 align-item-center text-center" style="width: 46px;" />

                    <button type="button" class="btn btn-link px-2" onclick="plus()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <input type="hidden" name="product_name" value="<?= $product_detail[0]['name'] ?>">
                <input type="hidden" name="price" value="<?= $product_detail[0]['price'] ?>">
                <input type="hidden" name="image" value="<?= $product_detail[0]['image'] ?>">

                <div class="buttons">
                    <button type="submit" class="add">Add to Cart</button>
                    <button class="like"><span>♥</span></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-12">
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">Marry Andrews</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                <div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function plus() {
        var quantityInput = document.querySelector('input[name="quantity"]');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        console.log(quantityInput.value);
    }

    function minus() {
        var quantityInput = document.querySelector('input[name="quantity"]');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
</script>