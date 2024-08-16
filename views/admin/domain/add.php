<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Domain Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Add Domain Information</h2>
        <form action="index.php?c=domain&a=store" method="post">
            <div class="mb-3">
                <label for="domain_name" class="form-label">Domain Name</label>
                <input type="text" class="form-control" id="domain_name" name="domain_name" required>
            </div>
            <div class="mb-3">
                <label for="public_key" class="form-label">Public Key</label>
                <input type="text" class="form-control" id="public_key" name="public_key" required>
            </div>
            <div class="mb-3">
                <label for="serve_key" class="form-label">Serve Key</label>
                <input type="text" class="form-control" id="serve_key" name="serve_key" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                <label class="form-check-label" for="is_active">Is Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>