<?php
function unlink_images()
{
    require_once '../../../controller/admin/product_images/select.php';
    foreach ($product_images as $product_image) {
        $old_image_path = '../../../uploads/product/' . $product_image['images'];
        var_dump(file_exists($old_image_path));
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }
}
