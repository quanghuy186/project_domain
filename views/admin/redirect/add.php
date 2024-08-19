<?php
    include('views/layouts/head.php');
    include('views/layouts/nav.php');
?>

<body>
    <div class="col-md">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Manager redirect </h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <div class="container mt-5">
                    <h2>Add Domain Information</h2>
                    <form action="index.php?c=redirect&a=store" method="post">
                        <div class="mb-3">
                            <label for="domain_name" class="form-label">Domain Name</label>
                            <input type="text" class="form-control" id="domain_name" name="domain_name">
                        </div>

                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['domain_name'])){
                                echo "<div class='text-danger text-left mb-3'>Please enter your domain name</div>";
                            }
                        ?>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>

                        <div class="d-flex justify-content-between align-item-center">
                            <button type="submit" class="btn btn-primary px-5 h-50">Submit</button>
                            <a href="<?php echo DOMAIN.'?c=redirect&a=index' ?>" class="btn btn-primary my-3">Back
                                home</a>
                        </div>

                    </form>
                </div>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"> <a class="page-link" href="#">«</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">»</a> </li>
                </ul>
            </div>
        </div> <!-- /.card -->

    </div>
    <?php
    include('views/layouts/footer.php');
?>