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
                <a href="<?php echo DOMAIN."?c=paypalGroup&a=add" ?>" class="btn btn-success my-3">Add Paypal Group</a>
                <a href="index.php?c=home" class="btn btn-primary my-3">Back Home</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th>Paypal group name</th>
                            <th>Time stamp</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($paypalGroups)): ?>
                        <?php $stt = 1; ?>
                        <?php foreach ($paypalGroups as $item): ?>
                        <tr class="align-middle">
                            <td><?php echo $stt++; ?>.</td>
                            <td><?php echo htmlspecialchars($item['group_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['time_stamp']); ?></td>

                            <td class="text-center">
                                <!-- edit -->
                                <a href="index.php?c=paypalGroup&a=edit&id=<?php echo $item['id']; ?>"
                                    class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- Nút Xóa kích hoạt modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal<?php echo $item['id']; ?>">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $item['id']; ?>" tabindex="-1"
                                    aria-labelledby="deleteModalLabel<?php echo $item['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?php echo $item['id']; ?>">
                                                    Xác
                                                    nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Đóng"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa mục này?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Hủy</button>
                                                <a href="index.php?c=paypalGroup&a=delete&id=<?php echo $item['id']; ?>"
                                                    class="btn btn-danger">
                                                    Xóa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Không có bản ghi nào.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
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