<?php
require_once '../../controller/admin/category/select.php';
require_once '../../controller/admin/user/select.php';
$nameErr = $priceErr = $descriptionErr
    = $category_idErr = $imageErr = '';
if (isset($_POST['buttonCreate'])) {
    require_once '../../requests/admin/product/store.php';
}

?>

<section class="content">
    <form method="post" action="http://localhost/project_perdo_1/asset/admin/master.php?page=create&modules=product" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product create</h3>

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
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Product name</label>
                            <label for="" class="error"><?= $nameErr  ?></label>
                            <input type="text" class="form-control" placeholder="Enter product name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <label for="" class="error"><?= $priceErr  ?></label>
                            <input type="text" class="form-control" placeholder="Enter product price" name="price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <label for="" class="error"><?= $descriptionErr  ?></label>
                            <textarea class="form-control" id="description" name="description"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" id="content" name="content"><?= isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
                        </div>

                        <!-- <div class="group-image-detail">
                            <div class="row">
                                <button type="button" class="btn btn-info w-100" id="add-image">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add image detail
                                </button>
                            </div>
                        </div> -->
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <label for="" class="error"><?= $category_idErr  ?></label>
                            <select class="form-control" name="category_id">
                                <option value="-1">----- Root -----</option>

                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category['id'] ?>" <?= isset($category) && (isset($_POST['category_id']) ? $_POST['category_id'] : -1) == $category['id'] ? 'selected' : '' ?>>
                                        <?= $category['name'] ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" <?= isset($_POST['status']) && $_POST['status'] == 1 ? 'selected' : '' ?>>Show</option>
                                <option value="2" <?= isset($_POST['status']) && $_POST['status'] == 2 ? 'selected' : '' ?>>Hidden</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Featured</label>
                            <select class="form-control" name="featured">
                                <option value="1" <?= isset($_POST['featured']) && $_POST['featured'] == 1 ? 'selected' : '' ?>>Featured</option>
                                <option value="2" <?= isset($_POST['featured']) && $_POST['featured'] == 2 ? 'selected' : '' ?>>UnFeatured</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <label for="" class="error"><?= $imageErr  ?></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="buttonCreate" value="create">Create</button>
            </div>
        </div>
        <!-- /.card -->
    </form>
</section>