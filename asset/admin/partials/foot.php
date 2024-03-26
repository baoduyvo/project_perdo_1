<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default action of the link
                var confirmed = confirm('Are you sure you want to delete?');
                if (confirmed) {
                    window.location.href = link.getAttribute('href');
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var imageCount = 0;
        $('#add-image').click(function() {
            imageCount++;
            var newRow = `
            <div class="row d-flex align-items-center">
                <div class="col-md-2">
                    <img src="http://localhost/project_perdo_1/dist/img/image-default.png" width="100%" alt="image-detail" id="image-${imageCount}">
                </div>
                <div class="col-md-8">
                    <input type="file" name="images[]" class="form-control" data-image="${imageCount}">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100 delete-image" id="add-image" data-image="${imageCount}">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>`;
            $('.group-image-detail').append(newRow);
        })

        $('.group-image-detail').on('click', '.delete-image', function() {
            var imageNumber = $(this).data("image");
            $('#image-' + imageNumber).closest(".row").remove();
        });

        $('.group-image-detail').on('change', 'input[name="images[]"]', function() {
            var imageNumber = $(this).data("image");
            var file = this.files[0];
            if (file) {
                var read = new FileReader();
                read.onload = function(e) {
                    $('#image-' + imageNumber).attr("src", e.target.result);
                }

                read.readAsDataURL(file);
            }
        });
    })
</script>
<script>
    function showData(page) {
        $.ajax({
            type: "post",
            url: "./master.php?page=index&modules=user",
            data: {
                page_no: page
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
            }
        });
    }

    function updateTable(data) {
        $('#example1 tbody').empty();
        const arr = Array.from(data);
        data.forEach(function(user, index) {
            var row = `<tr>
                            <td>${index + 1}</td>
                            <td>${user['email']}</td>
                            <td>${user['full_name']}</td>
                            <td>${user['level'] == 1 ? 'Admin' : 'Member'}</td>
                            <td>${user['gender'] == 1 ? 'Male' : 'Female'}</td>
                            <td>${user['phone']}</td>
                            <td>${user['status'] == 1 ? '<span class="badge badge-success">&nbsp;&nbsp;On&nbsp;&nbsp;</span>' : '<span class="badge badge-danger">&nbsp;&nbsp;Off&nbsp;&nbsp;</span>'}</td>
                            <td><a class="btn btn-info btn-sm" href="http://localhost/project_perdo_1/asset/admin/master.php?page=edit&modules=user&key=${index}&id=${user['id']}"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                            <td><a class="btn btn-danger btn-sm delete-link" href="../../controller/admin/user/delete.php?id=${user['id']}"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>`;
            $('#example1 tbody').append(row);
        });
    }

    $(document).on('click', '.example1_paginate a', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
        var page = $(this).text(); // Lấy số trang từ nội dung của liên kết
        showData(page); // Hiển thị dữ liệu cho trang được chọn
    });

    // Hiển thị dữ liệu trang đầu tiên khi trang được tải
    showData(1);
</script>