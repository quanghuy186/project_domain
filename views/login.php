<?php
require(ROOT."/views/layouts/header.php");
?>

<div class="main w-[80%] h-[500px] flex items-center mx-auto justify-center">
    <div class="login text-center mt-20 p-6 bg-white shadow-lg rounded-lg border border-gray-200">
        <div class="title font-bold text-4xl text-red-600 mb-6">
            Login with us
        </div>

        <div class="form-login">
            <form action="index.php?c=login&a=xlLogin" method="POST" class="space-y-6">

                <div class="input-group">
                    <label for="fullName" class="block text-left font-medium text-gray-700">Enter Name</label>
                    <input name="fullName" type="text" id="fullName"
                        class="border-2 border-rose-600 w-full py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500"
                        placeholder="Your name">

                    <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['fullName'])) {
                            echo "<div class='text-red-600 mt-2 text-left'>Please enter your name</div>";
                        } 
                    ?>
                </div>

                <div class="input-group mt-4">
                    <label for="password" class="block text-left font-medium text-gray-700">Enter Password</label>
                    <input type="password" name="password" id="password"
                        class="border-2 border-rose-600 w-full py-2 px-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500"
                        placeholder="Your password">

                    <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['password'])) {
                            echo "<div class='text-red-600 mt-2 text-left'>Please enter your password</div>";
                        } 
                    ?>
                </div>

                <div class="login-footer flex justify-between items-center mt-4">
                    <div class="remember flex items-center">
                        <input type="checkbox" id="remember" class="mr-2">
                        <label for="remember" class="text-gray-700">Remember me</label>
                    </div>
                    <div class="text-blue-900">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

                <div class="text-start mt-4 text-gray-700">
                    Nếu bạn chưa có tài khoản hãy bấm
                    <a class="text-red-600 hover:underline" href="<?= DOMAIN.'?c=register&a=index' ?>">Đăng ký</a>
                </div>

                <div class="submit mt-6">
                    <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Đăng
                        nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// if(isset($_POST['fullName'])){
//     if ($_POST['fullName'] == 'huy') {
//         $_SESSION['fullName'] = $_POST['fullName'];

//         header("Location: ?c=home&a=index");
//     }
// }
?>