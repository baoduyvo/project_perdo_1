<?php
$category_nameError = '';
if (isset($_POST['buttonCreate'])) {
    require_once '../../requests/admin/category/store.php';
}

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>Category create</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <form method="post" action="http://localhost/project_perdo_1/asset/admin/master.php?page=create&modules=category">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category create</h3>

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
                <div class="form-group">
                    <label>Category name</label>
                    <label for="" class="error"><?= $category_nameError ?></label>
                    <input type="text" class="form-control" placeholder="Enter category name" name="name" value="">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" <?= isset($_POST['status']) && $_POST['status'] == 1 ? 'selected' : '' ?>>Show</option>
                        <option value="2" <?= isset($_POST['status']) && $_POST['status'] == 2 ? 'selected' : '' ?>>Hidden</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="buttonCreate" value="create">Create</button>
            </div>
        </div>
        <!-- /.card -->
    </form>
</section>