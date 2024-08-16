<?php
class LoginController {
    public $conn;
    public $model;

    public function __construct() {
        $this->model = new Login();
    }

    public function index() {

        include(ROOT . "/views/login.php");
    }

   

    public function xlLogin(){
        $result = $this->model->login();
        $username = htmlspecialchars(trim($_POST['fullName']));

        if ($result) {
            header("Location: ?c=home&a=index");
            exit(); 
        } else {
            $error = "Invalid username or password";
            include('views/login.php'); 
        }
    }
    
    public function logout(){
        $this->model->logout();
    }



}