<?php
$emailErr = $passwordErr = $password_confirmationErr
    = $full_nameErr = $imageErr = $addressErr = $phoneErr = '';
if (isset($_POST['buttonCreate'])) {
    require_once '../../requests/admin/user/store.php';
};
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>User List</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- ../../controller/admin/user/insert.php -->
    <form method="POST" action="http://localhost/project_perdo_1/asset/admin/master.php?page=create&modules=user" enctype="multipart/form-data">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User create</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <label for="" class="error"><?= $emailErr  ?></label>
                    <input type="text" class="form-control" placeholder="Enter email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <label for="" class="error"><?= $passwordErr  ?></label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" <?= isset($_POST['status']) && $_POST['status'] == 1 ? 'selected' : '' ?>>Show</option>
                                <option value="2" <?= isset($_POST['status']) && $_POST['status'] == 2 ? 'selected' : '' ?>>Hidden</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <label for="" class="error"><?= $password_confirmationErr  ?></label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level">
                                <option value="1" <?= isset($_POST['level']) && $_POST['level'] == 1 ? 'selected' : '' ?>>Admin</option>
                                <option value="2" <?= isset($_POST['level']) && $_POST['level'] == 2 ? 'selected' : '' ?>>Member</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fullname</label>
                    <label for="" class="error"><?= $full_nameErr  ?></label>
                    <input type="text" class="form-control" placeholder="Enter fullname" name="full_name" value="<?= isset($_POST['full_name']) ? $_POST['full_name'] : '' ?>">
                </div>


                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Image</label>
                            <label for="" class="error"><?= $imageErr  ?></label>
                            <input type="file" class="form-control" name="image" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="1" <?= isset($_POST['gender']) && $_POST['gender'] == 1 ? 'selected' : '' ?>>Male</option>
                            <option value="2" <?= isset($_POST['gender']) && $_POST['gender'] == 2 ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <label class="error"><?= $addressErr  ?></label>
                    <input type="text" class="form-control" placeholder="Enter address" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <label for="" class="error"><?= $phoneErr  ?></label>
                    <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <input type="hidden" name="buttonCreate" value="create">
            </div>
        </div>
        <!-- /.card -->
    </form>
    <!-- /.card -->
</section>