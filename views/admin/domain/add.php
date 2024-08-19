<?php
    include('views/layouts/head.php');
    include('views/layouts/nav.php');
?>

<body>
    <div class="col-md">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Manager Domain </h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <div class="container mt-5">
                    <h2>Add Domain Information</h2>
                    <form action="index.php?c=domain&a=store" method="post">
                        <div class="">
                            <label for="domain_name" class="form-label">Domain Name</label>
                            <input type="text" class="form-control" id="domain_name" name="domain_name">
                        </div>

                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['domain_name'])){
                                echo "<div class='text-danger text-left mb-3'>Please enter your domain name</div>";
                            }
                        ?>

                        <div class="mt-3">
                            <label for="public_key" class="form-label">Public Key</label>
                            <input type="text" class="form-control" id="public_key" name="public_key">
                        </div>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['public_key'])){
                                echo "<div class='text-danger mb-3 text-left'>Please enter your public key</div>";
                            }
                        ?>
                        <div class="mt-3">
                            <label for="serve_key" class="form-label">Serve Key</label>
                            <input type="text" class="form-control" id="serve_key" name="serve_key">
                        </div>

                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['serve_key'])){
                                echo "<span class='text-danger mb-3 text-left'>Please enter your server key</span>";
                            }
                        ?>
                        <div class="mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>

                        <div class="d-flex justify-content-between align-item-center mt-3">
                            <button type="submit" class="btn btn-primary px-5 h-50">Submit</button>
                            <a href="<?php echo DOMAIN.'?c=home&a=index' ?>" class="btn btn-primary my-3">Back
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