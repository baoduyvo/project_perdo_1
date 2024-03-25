<?php
require_once '../../controller/admin/category/select.php';
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>Category list</h1>
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
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Create At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $key => $category) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                            <span class="right badge badge-<?= ($category['status'] == 1) ? 'success' : 'dark'; ?>">
                                <?= ($category['status'] == 1 ? 'Show' : 'Hidden'); ?>
                            </span>
                        </td>
                        <td><?= date('d-m-Y', strtotime($category['created_at'])) ?></td>
                        <td><a href="http://localhost/project_perdo_1/asset/admin/master.php?page=edit&modules=category&key=<?= $key ?>&id=<?= $category['id'] ?>">Edit</a></td>
                        <td><a class="delete-link" href="../../controller/admin/category/delete.php?id=<?= $category['id'] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Create At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>