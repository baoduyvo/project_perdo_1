<?php
require_once '../../controller/admin/user/select.php';
$key = $_GET['key'];
$id = $_GET['id'];

?>

<section class="content">
    <!-- Default box -->
    <form method="post" action="../../controller/admin/user/update.php?id=<?= $id ?>" enctype="multipart/form-data">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Update</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="hidden" name="id" value="<?php print_r($users[$key]['id']); ?>">
                    <input type="text" class="form-control" placeholder="Enter email" name="email" value="<?php print_r($users[$key]['email']); ?>">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>

                            <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
                            <input type="hidden" name="old_password" value="<?php print_r($users[$key]['password']); ?>">

                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" <?= ($users[$key]['status'] == 1) ? 'selected' : ''; ?>>Show</option>
                                <option value="2" <?= ($users[$key]['status'] == 2) ? 'selected' : ''; ?>>Hidden</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>

                            <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level">
                                <option value="1" <?= ($users[$key]['level'] == 1) ? 'selected' : ''; ?>>Admin</option>
                                <option value="2" <?= ($users[$key]['level'] == 2) ? 'selected' : ''; ?>>Member</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fullname</label>

                    <input type="text" class="form-control" placeholder="Enter fullname" name="full_name" value="<?php print_r($users[$key]['full_name']); ?>">
                </div>


                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Image</label>

                            <input type="file" class="form-control" name="image" value="">
                            <input type="hidden" name="old_image" value="<?php print_r($users[$key]['image']); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="1" <?= ($users[$key]['gender'] == 1) ? 'selected' : ''; ?>>Male</option>
                            <option value="2" <?= ($users[$key]['gender'] == 2) ? 'selected' : ''; ?>>Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Address</label>
                    <input type="text" class="form-control" placeholder="Enter address" name="address" value="<?php print_r($users[$key]['address']); ?>">
                </div>

                <div class="form-group">
                    <label>Phone</label>

                    <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?php print_r($users[$key]['phone']); ?>">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="buttonUpdate" value="update">Update</button>
            </div>
        </div>
        <!-- /.card -->
    </form>
    <!-- /.card -->
</section>