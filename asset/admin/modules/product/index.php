<?php
require_once '../../controller/admin/product/select.php';
require_once '../../function/search_keyword.php';
if (isset($_POST['buttonSearch'])) {
    $keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
    $search = 'name';
    $products = searchByKeyWord($products, $keyword, $search);
}

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>Product List</h1>
            </div>
            <div class="col-md-6 offset-md-2">
                <form action="http://localhost/project_perdo_1/asset/admin/master.php?page=index&modules=product" method="post">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" placeholder="your keywords here" name="keyword" value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" autocomplete="off">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default" name="buttonSearch" value="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product List</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Create At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="body">
                <?php foreach ($products as $key => $product) { ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= ucwords($product['name']); ?></td>
                        <td><?= number_format($product['price'], 0, '', '.') ?> VND</td>
                        <td><?= ucwords($product['category_name']); ?></td>
                        <td>
                            <span class="right badge badge-<?= ($product['status'] == 1) ? 'success' : 'dark'; ?>">
                                <?= ($product['status'] == 1 ? 'Show' : 'Hidden'); ?>
                            </span>
                        </td>
                        <td>
                            <span class="right badge badge-<?= ($product['featured'] == 1) ? 'info' : 'danger'; ?>">
                                <?= ($product['featured'] == 1 ? 'Featured' : 'UnFeatured'); ?>
                            </span>
                        </td>
                        <td><?= date('d-m-Y', strtotime($product['created_at'])) ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="http://localhost/project_perdo_1/asset/admin/master.php?page=edit&modules=product&key=<?= $key ?>&product_id=<?= $product['id'] ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm delete-link" href="../../controller/admin/product/delete.php?product_id=<?= $product['id'] ?>&image=<?= $product['image'] ?>">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Create At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <?php
    $records_per_page = 4;
    $paginate = count($products);
    ?>
    <div class="row">
        <div class="px-4 col-md-7 text-right offset-md-5">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination justify-content-end example1_paginate">
                    <li class="paginate_button page-item previous" id="example1_previous"><a href="#" aria-controls="example1" id="0" tabindex="0" class="page-link">Previous</a></li>
                    <!-- active -->
                    <?php for ($i = 0; $i < $paginate / $records_per_page; $i++) { ?>
                        <li class="paginate_button page-item">
                            <button id="<?= $i + 1 ?>" class="page-link" onclick="pagination(<?= $i + 1 ?>)">
                                <?= $i + 1 ?>
                            </button>
                        </li>
                    <?php } ?>
                    <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" id="7" tabindex="0" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function pagination(i) {
        $.ajax({
            type: "POST",
            url: "../../function/pagination.php",
            data: {
                i: i
            },
            success: function(response) {
                updateProductTable(response);
            }
        });
    }

    function updateProductTable(response) {
        var products = JSON.parse(response).products;
        // console.log(products)
    }
</script>