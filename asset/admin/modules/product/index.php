<?php
require_once '../../controller/admin/product/select.php';
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>Product List</h1>
            </div>
            <div class="col-sm-8">
                <ol class="breadcrumb float-sm-right">
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </ol>
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
            <tbody>
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
</div>