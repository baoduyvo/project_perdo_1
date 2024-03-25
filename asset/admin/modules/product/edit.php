<?php
require_once '../../controller/admin/product/select.php';
require_once '../../controller/admin/category/select.php';
$key = $_GET['key'];
$product_id = $_GET['product_id'];
?>

<section class="content">
    <form method="post" action="../../controller/admin/product/update.php?product_id=<?= $product_id ?>" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" placeholder="Enter product name" name="name" value="<?php print_r($products[$key]['name']); ?>">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="Enter product price" name="price" value="<?php print_r($products[$key]['price']); ?>">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description" name="description"><?php print_r($products[$key]['description']); ?></textarea>

                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" id="content" name="content"><?php print_r($products[$key]['content']); ?></textarea>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option value="-1">----- Root -----</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category['id']; ?>" <?= ($category['id'] == $products[$key]['category_id']) ? "selected" : ''; ?>>
                                        <?= $category['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" <?= ($products[$key]['status']) == 1 ? 'selected' : ''; ?>>Show</option>
                                <option value="2" <?= ($products[$key]['status']) == 2 ? 'selected' : ''; ?>>Hidden</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Featured</label>
                            <select class="form-control" name="featured">
                                <option value="1" <?= ($products[$key]['featured']) == 1 ? 'selected' : ''; ?>>Featured</option>
                                <option value="2" <?= ($products[$key]['featured']) == 2 ? 'selected' : ''; ?>>UnFeatured</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="row justify-content-around">
                                <div class="col-md-4">
                                    <div data-category="3, 4" data-sort="red sample">
                                        <img src="../../uploads/product/<?= $products[$key]['image']; ?>" class="img-fluid mb-2" alt="image_old">
                                        <input type="hidden" name="old_image" value="<?= $products[$key]['image']; ?>">
                                    </div>
                                </div>
                            </div>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <!-- /.card -->
    </form>
</section>