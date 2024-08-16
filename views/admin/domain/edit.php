<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Domain Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Domain Information</h2>
        <form action="index.php?c=domain&a=update" method="post">
            <div class="mb-3">
                <input hidden type="text" class="form-control" id="id" name="id" value="<?php echo $domain['id']; ?>"
                    readonly>
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

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>