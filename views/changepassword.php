<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h1 class="text-2xl font-semibold mb-6">Change Password</h1>
        <form action="index.php?c=account&a=process_pass" method="POST">
            <div class="mb-4">
                <label for="old_password" class="block text-gray-700 text-sm font-semibold mb-2">Old Password</label>
                <input type="password" id="old_password" name="old_password"
                    class="border border-gray-300 p-2 w-full rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 text-sm font-semibold mb-2">New Password</label>
                <input type="password" id="new_password" name="new_password"
                    class="border border-gray-300 p-2 w-full rounded-md" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 w-full rounded-md hover:bg-blue-600">Change
                Password</button>
        </form>
    </div>
</body>

</html>