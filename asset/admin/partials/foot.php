<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
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
            url: "http://localhost/project_perdo_1/asset/admin/master.php?page=index&modules=user",
            data: {
                page_no: page
            },
            success: function(response) {
                // Handle your response data here
            },
            error: function(xhr, status, error) {
                // Handle errors here
            }
        });
    }

    $(document).on('click', '.example1_paginate a', function() {
        var page = $(this).attr('id');
        showData(page);
    });
</script>