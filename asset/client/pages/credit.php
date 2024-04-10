<?php
require_once '../../controller/client/show_cart_detail.php';

$total = 0;
foreach ($cart_details as $cart_detail) {
    $total += ($cart_detail['quantity'] * $cart_detail['price']);
}

$addressError = $phoneErr = '';

if (isset($_POST['credit'])) {
    empty($_POST['address']) ? $addressError = '* Address is required' : $address = trim($_POST['address']);
    if (empty($_POST['phone'])) {
        $phoneErr = '* Phone is required';
    } else {
        $regex = '/^[0-9]{10}$/';
        if (preg_match($regex, $_POST['phone'])) {
            $phone = trim($_POST['phone']);
        } else {
            $phoneErr = "* Phone is munbers";
        }
    }
    if (empty($addressError) && empty($phoneErr)) {
        require_once '../../controller/client/bill.php';

        $sql = 'UPDATE cart_detail SET status=:status WHERE user_id=:user_id';

        try {
            $statement = $conn->prepare($sql);

            $statement->bindValue('status', 2);
            $statement->bindValue('user_id', $_SESSION['member_id']);

            $statement->execute();
        } catch (Exception $ex) {
            echo 'message: ' . $ex->getMessage() . '<br/>';
            echo 'file: ' . $ex->getFile() . '<br/>';
            echo 'line: ' . $ex->getLine() . '<br/>';
            die();
        }

        echo '<script> window.location.href="./master.php?page=home"</script>';
        exit();
    }
}
?>

<div class="row mb-4 mt-4">
    <div class="col-lg-8 mx-auto text-center">
        <h1 class="display-4">Credit card form</h1>
        <p class="lead mb-0">Easily build a well-structured credit card form using Bootstrap 4</p>
        <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets">Bootstrapious</a></p>
    </div>
</div>
<!-- End -->


<div class="row">
    <div class="col-lg-8 mx-auto mb-4">
        <div class="bg-white rounded-lg shadow-sm p-5">
            <!-- Credit card form tabs -->
            <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                        <i class="fa fa-credit-card"></i>
                        Credit Card
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                        <i class="fa fa-paypal"></i>
                        Paypal
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                        <i class="fa fa-university"></i>
                        Bank Transfer
                    </a>
                </li>
            </ul>
            <!-- End -->


            <!-- Credit card form content -->
            <div class="tab-content">

                <!-- credit card info-->
                <div id="nav-tab-card" class="tab-pane fade show active">
                    <form role="form" method="post" action="http://localhost/project_perdo_1/asset/client/master.php?pages=credit">
                        <div class="form-group">
                            <label for="username">Email (on the card)</label>
                            <input type="text" name="email" value="<?= $_SESSION['member_email'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="full_name">Full name (on the card)</label>
                            <input type="text" name="full_name" value="<?= $_SESSION['member_name'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <label for="" class="error"><?= $phoneErr  ?></label>
                            <input type="text" name="phone" class="form-control" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Address</label>
                            <label for="" class="error"><?= $addressError  ?></label>

                            <div class="input-group">
                                <input type="text" name="address" placeholder="Your address" class="form-control" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text text-muted">
                                        <i class="fa fa-cc-visa mx-1"></i>
                                        <i class="fa fa-cc-amex mx-1"></i>
                                        <i class="fa fa-cc-mastercard mx-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label><span class="hidden-xs">Expiration</span></label>
                                    <div class="input-group">
                                        <input type="number" name="" class="form-control" value="<?= date("m") ?>" readonly>
                                        <input type="number" name="" class="form-control" value="<?= date("Y") ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label data-toggle="tooltip" title="Three-digits code on the back of your card">Cart Total
                                        <i class="fa fa-question-circle"></i>
                                    </label>
                                    <input type="text" value="<?= number_format($total, 0, '', '.') ?> VND" class="form-control" readonly>
                                    <input type="hidden" name="cart_total" value="<?= $total ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="subscribe btn btn-warning btn-block rounded-pill shadow-sm py-3" name="credit" value="buttonCredit"> Confirm </button>
                    </form>
                </div>
                <!-- End -->

                <!-- Paypal info -->
                <div id="nav-tab-paypal" class="tab-pane fade">
                    <p>Paypal is easiest way to pay online</p>
                    <p>
                        <button type="button" class="btn btn-primary rounded-pill"><i class="fa fa-paypal mr-2"></i> Log into my Paypal</button>
                    </p>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <!-- End -->

                <!-- bank transfer info -->
                <div id="nav-tab-bank" class="tab-pane fade">
                    <h6>Bank account details</h6>
                    <dl>
                        <dt>Bank</dt>
                        <dd> THE WORLD BANK</dd>
                    </dl>
                    <dl>
                        <dt>Account number</dt>
                        <dd>7775877975</dd>
                    </dl>
                    <dl>
                        <dt>IBAN</dt>
                        <dd>CZ7775877975656</dd>
                    </dl>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
                <!-- End -->
            </div>
            <!-- End -->

        </div>
    </div>
</div>