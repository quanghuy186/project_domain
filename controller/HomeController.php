<?php
 class HomeController{
    protected $model;
    protected $domain;

    public function __construct()
    {
        $this->model = new Account();
        $this->domain = new Domain();
    }

    public function index() {
        // $users = $this->model->all();
        // include('views/home.php');
        $domains = $this->domain->all();
        include('views/home.php');
    }

    public function edit($id) {
        $stm = $this->model->conn->prepare("SELECT * FROM accounts WHERE id = :id");
        $stm->bindParam(':id', $id);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            include('views/edit.php'); 
        } else {
            echo "User not found";
        }
    }
    
    public function delete($id) {
        $stm = $this->model->conn->prepare("DELETE FROM accounts WHERE id = :id");
        $stm->bindParam(':id', $id);
        if ($stm->execute()) {
            header("Location: ?action=index"); 
        } else {
            echo "Failed to delete user";
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
        
        $stm = $this->model->conn->prepare("UPDATE accounts SET full_name = :full_name, username = :username, email = :email, public_key = :public_key, server_key = :server_key, is_active = :is_active WHERE id = :id");
        $stm->bindParam(':id', $id);
        $stm->bindParam(':full_name', $fullName);
        $stm->bindParam(':username', $username);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':public_key', $publicKey);
        $stm->bindParam(':server_key', $serverKey);
        $stm->bindParam(':is_active', $isActive);
        
        if ($stm->execute()) {
            header("Location: ?action=index"); 
        } else {
            echo "Failed to update user";
        }
    }
    
    public function store() {
        $fullName = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $publicKey = $_POST['public_key'];
        $serverKey = $_POST['server_key'];
        $isActive = isset($_POST['is_active']) ? 1 : 0;
    
        $stm = $this->model->conn->prepare("INSERT INTO accounts (full_name, username, email, password, public_key, server_key, is_active) VALUES (:full_name, :username, :email, :password, :public_key, :server_key, :is_active)");
        $stm->bindParam(':full_name', $fullName);
        $stm->bindParam(':username', $username);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); 
        $stm->bindParam(':public_key', $publicKey);
        $stm->bindParam(':server_key', $serverKey);
        $stm->bindParam(':is_active', $isActive);
        
        if ($stm->execute()) {
            header("Location: ?action=index"); 
            echo "Failed to add user";
        }
    }
    

 }