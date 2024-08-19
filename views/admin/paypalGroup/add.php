<?php
    include('views/layouts/head.php');
    include('views/layouts/nav.php');
?>

<body>
    <div class="col-md">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Manager Paypal Group</h3>
            </div> <!-- /.card-header -->
            <div class="card-body">
                <div class="container mt-5">
                    <h2>Add paypal group Information</h2>
                    <form action="index.php?c=paypalGroup&a=store" method="post">
                        <div class="mb-3">
                            <label for="group_name" class="form-label">Group name</label>
                            <input type="text" class="form-control" id="group_name" name="group_name">
                        </div>

                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['group_name'])){
                                echo "<div class='text-danger mb-3 text-left'>Please enter your paypal group name</div>";
                            }
                        ?>
                        <!-- 
                        <div class="mb-3">
                            <label for="time_stamp" class="form-label">Paypal Time Stamp</label>
                            <input type="text" class="form-control" id="time_stamp" name="time_stamp">
                        </div> -->

                        <div class="d-flex justify-content-between align-item-center">
                            <button type="submit" class="btn btn-primary px-5 h-50">Submit</button>
                            <a href="<?php echo DOMAIN.'?c=paypalGroup&a=index' ?>" class="btn btn-primary my-3">Back
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