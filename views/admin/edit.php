<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <form action="index.php?c=account&a=update&id=<?php echo $user['id']; ?>" method="post">
        <div class="mb-3">
            <input hidden type="text" id="id" name="id" value="<?php echo $user['id']; ?>" class="form-control"
                readonly>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"
                class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>"
                class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="public_key" class="form-label">Public Key</label>
            <input type="text" id="public_key" name="public_key" value="<?php echo $user['public_key']; ?>"
                class="form-control">
        </div>

        <div class="mb-3">
            <label for="server_key" class="form-label">Server Key</label>
            <input type="text" id="server_key" name="server_key" value="<?php echo $user['server_key']; ?>"
                class="form-control">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" value="1"
                <?php echo $user['is_active'] ? 'checked' : ''; ?>>
            <label for="is_active" class="form-check-label">Is Active</label>
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="text" id="created_at" name="created_at" value="<?php echo $user['created_at']; ?>"
                class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="text" id="updated_at" name="updated_at" value="<?php echo $user['updated_at']; ?>"
                class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>