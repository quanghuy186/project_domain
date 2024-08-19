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
                    <h2>Edit paypal Information</h2>
                    <form action="index.php?c=paypal&a=update&id=<?php echo $paypal['id']; ?>" method="post">
                        <div class="mb-3">
                            <label for="paypal_email" class="form-label">Paypal email</label>
                            <input type="text" class="form-control" id="paypal_email" name="paypal_email"
                                value="<?php echo $paypal['paypal_email']; ?>" required>
                        </div>
                        <select class="form-select w-25 my-3" aria-label="Default select example"
                            name="paypal_group_id">
                            <?php
                                foreach($paypalGroups as $group){
                                    $selected = ($group['id'] == $currentPaypalGroupId['id']) ? 'selected' : '';
                            ?>
                            <option class="paypal_group_id" name="paypal_group_id" value="<?php echo $group['id']?>"
                                <?php echo $selected; ?>>
                                <?php echo htmlspecialchars($group['group_name']); ?>
                            </option>
                            <?php
                        }
                          ?>
                        </select>

                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" value="1"
                                <?php echo $paypal['is_active'] ? 'checked' : ''; ?>>
                            <label for="is_active" class="form-check-label">Is Active</label>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_died" name="is_died" class="form-check-input" value="1"
                                <?php echo $paypal['is_died'] ? 'checked' : ''; ?>>
                            <label for="is_died" class="form-check-label">Is Died</label>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" id="is_sandbox" name="is_sandbox" class="form-check-input" value="1"
                                <?php echo $paypal['is_sandbox'] ? 'checked' : ''; ?>>
                            <label for="is_sandbox" class="form-check-label">Is Sandbox</label>
                        </div>

                        <div class="d-flex justify-content-between align-item-center">
                            <button type="submit" class="btn btn-primary px-5 h-50">Submit</button>
                            <a href="<?php echo DOMAIN.'?c=paypal&a=index' ?>" class="btn btn-primary my-3">Back
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