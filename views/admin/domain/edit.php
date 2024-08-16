<?php
    include('views/layouts/head.php');
    include('views/layouts/nav.php');
?>

<body>
    <div class="col-md">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Manager Paypal </h3>
            </div> <!-- /.card-header -->
            <div class="card-body">

                <div class="container mt-5">
                    <h2>Edit Domain Information</h2>
                    <form action="index.php?c=domain&a=update" method="post">
                        <div class="mb-3">
                            <input hidden type="text" class="form-control" id="id" name="id"
                                value="<?php echo $domain['id']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="domain_name" class="form-label">Domain Name</label>
                            <input type="text" class="form-control" id="domain_name" name="domain_name"
                                value="<?php echo $domain['domain_name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="public_key" class="form-label">Public Key</label>
                            <input type="text" class="form-control" id="public_key" name="public_key"
                                value="<?php echo $domain['public_key']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="serve_key" class="form-label">Serve Key</label>
                            <input type="text" class="form-control" id="serve_key" name="serve_key"
                                value="<?php echo $domain['serve_key']; ?>" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" value="1"
                                <?php echo $domain['is_active'] ? 'checked' : ''; ?>>
                            <label for="is_active" class="form-check-label">Is Active</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="index.php?c=home">Back</a>
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