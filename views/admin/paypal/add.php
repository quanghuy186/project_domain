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
                    <h2>Add paypal Information</h2>
                    <form action="index.php?c=paypal&a=store" method="post">
                        <div class="mt-3">
                            <label for="paypal_email" class="form-label">Paypal Email</label>
                            <input type="text" class="form-control" id="paypal_email" name="paypal_email" require>
                        </div>

                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['paypal_email'])){
                                echo "<div class='text-danger mb-3 text-left'>Please enter your paypal email</div>";
                            }
                        ?>

                        <div class="mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>

                        <div class="mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_died" name="is_died">
                            <label class="form-check-label" for="is_died">Is Died</label>
                        </div>

                        <div class="mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_sandbox" name="is_sandbox">
                            <label class="form-check-label" for="is_sandbox">Is Sandbox</label>
                        </div>

                        <select class="form-select w-25 mt-3" aria-label="Default select example"
                            name="paypal_group_id">
                            <?php
                                foreach($paypalGroups as $group){
                                    $selected = ($group['id'] == $selectedGroupId) ? 'selected' : '';
                            ?>
                            <option class="paypal_group_id" value="<?php echo $group['id']?>" <?php echo $selected; ?>>
                                <?php echo htmlspecialchars($group['group_name']); ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>

                        <div class="d-flex justify-content-between align-item-center mt-3">
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