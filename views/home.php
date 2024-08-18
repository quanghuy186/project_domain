<?php
    include('views/layouts/head.php');
    include('views/layouts/nav.php');
?>
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="app-content">
        <a href="index.php?c=domain&a=add">
            <div class="btn btn-success">
                <span class="">Add Domain</span>
            </div>
        </a>

        <div class="col-md">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Manager</h3>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th>Domain Name</th>
                                <th>Public Key</th>
                                <th>Server Key</th>
                                <th>Active</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($domains)): ?>
                            <?php $stt = 1; ?>
                            <?php foreach ($domains as $domain): ?>
                            <tr class="align-middle">
                                <td><?php echo $stt++; ?>.</td>
                                <td><?php echo htmlspecialchars($domain['domain_name']); ?></td>
                                <td><?php echo htmlspecialchars($domain['public_key']); ?></td>
                                <td><?php echo htmlspecialchars($domain['serve_key']); ?></td>

                                <td><?php echo $domain['is_active'] ? 'Active' : 'Inactive'; ?>
                                    <!-- <select name="selectActive " class="selectActive form-select"
                                        data-id="<?php echo $domain['id']; ?>">
                                        <option value="0" <?php echo $domain['is_active'] ? 'selected' : ''; ?>>Active
                                        </option>
                                        <option value="1" <?php echo $domain['is_active'] ? 'selected' : ''; ?>>Inactive
                                        </option>
                                    </select> -->
                                </td>

                                <td class="text-center">
                                    <a href="index.php?c=domain&a=edit&id=<?php echo $domain['id']; ?>"
                                        class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Nút Xóa kích hoạt modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal<?php echo $domain['id']; ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $domain['id']; ?>" tabindex="-1"
                                        aria-labelledby="deleteModalLabel<?php echo $domain['id']; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteModalLabel<?php echo $domain['id']; ?>">Xác
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
                                                    <a href="index.php?c=domain&a=delete&id=<?php echo $domain['id']; ?>"
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
    </div>

    <!-- <script>
    $(document).ready(function() {
        $('.selectActive').on('change', function() {
            var domainId = $(this).data('id');
            var isActive = $(this).val();

            alert(domainId + '');
            $.ajax({
                url: '?c=domain&a=update',
                type: 'POST',
                data: {
                    id: domainId,
                    is_active: isActive
                },
                success: function(response) {
                    alert('Status updated successfully!');
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    });
    </script> -->
</main>

<?php
    include('views/layouts/footer.php');
?>