<?php

class AccountController{
    public $model;

    public function __construct()
    {
        $this->model = new Account();
    }

    public function index() {
        $users = $this->model->all();
        include('views/home.php');
    }

    public function add() {

        include('views/admin/add.php');
        // header('Location: views/admin/add.php');
    }
    
    public function edit() {
        $id = $_GET['id'];
        if (!isset($id) || empty($id)) {
            die("Invalid ID provided.");
        }
        $user = $this->model->find($id);
        if ($user === false) {
            die("User not found.");
        }
        include('views/admin/edit.php');
    }
    
    public function delete() {
        $id = $_GET['id'];
        if($this->model->destroy($id)){
            header("Location: index.php?c=account"); 
        }
    }
        
    public function update() {
        $id = $_POST['id'];
        $fullName = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $publicKey = $_POST['public_key'];
        $serverKey = $_POST['server_key'];
        $isActive = isset($_POST['is_active']) ? 1 : 0;
        
        $stm = $this->model->conn->prepare("UPDATE accounts SET username = :username, email = :email, public_key = :public_key, server_key = :server_key, is_active = :is_active WHERE id = :id");
        $stm->bindParam(':id', $id);
        $stm->bindParam(':username', $username);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':public_key', $publicKey);
        $stm->bindParam(':server_key', $serverKey);
        $stm->bindParam(':is_active', $isActive);
        
        if ($stm->execute()) {
            header("Location: index.php?c=account"); 
        } else {
            echo "Failed to update user";
        }
    }
    
    public function store() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $publicKey = $_POST['public_key'];
        $serverKey = $_POST['server_key'];
        $isActive = isset($_POST['is_active']) ? 1 : 0;
        $stm = $this->model->conn->prepare("INSERT INTO accounts (username, email, password, public_key, server_key, is_active) VALUES (:username, :email, :password, :public_key, :server_key, :is_active)");
        $stm->bindParam(':username', $username);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); 
        $stm->bindParam(':public_key', $publicKey);
        $stm->bindParam(':server_key', $serverKey);
        $stm->bindParam(':is_active', $isActive);
        
        if ($stm->execute()) {
            header("Location: index.php?c=home"); 
            echo "Failed to add user";
        }
    }
    
    public function changePass(){
        
        include('views/changepassword.php');
    }

    public function process_pass(){
        $rs = $this->model->changePassword();
        if($rs){
            header("Location: ?c=home");
        } 
        // else {
        //     $error = "Invalid username or password";
        //     include('views/login.php'); 
        // }
    }

}