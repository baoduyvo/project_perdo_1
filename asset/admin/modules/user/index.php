<?php
require_once '../../controller/admin/user/select.php';
require_once '../../function/search_keyword.php';
if (isset($_POST['buttonSearch'])) {
    $keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
    $search = 'full_name';
    $users = searchByKeyWord($users, $keyword, $search);
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>User List</h1>
            </div>
            <div class="col-md-6 offset-md-2">
                <form action="http://localhost/project_perdo_1/asset/admin/master.php?page=index&modules=user" method="post">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" placeholder="full name your keywords here" name="keyword" value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" autocomplete="off">
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
    <div class="card-body">
        <table id="example1" class="table table-bo  rdered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Level</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['full_name'] ?></td>
                        <td><?= $user['level'] == 1 ? 'Admin' : 'Member' ?></td>
                        <td><?= $user['gender'] == 1 ? 'Male' : 'Female' ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td>
                            <?= $user['status'] == 1 ?
                                '<span class="badge badge-success">&nbsp;&nbsp;On&nbsp;&nbsp;</span>'
                                : '<span class="badge badge-danger">&nbsp;&nbsp;Off&nbsp;&nbsp;</span>'
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="http://localhost/project_perdo_1/asset/admin/master.php?page=edit&modules=user&key=<?= $key ?>&id=<?= $user['id'] ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm delete-link" href="../../controller/admin/user/delete.php?id=<?= $user['id'] ?>">
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
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Level</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
</div>