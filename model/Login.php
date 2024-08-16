<?php
class Login {
    public $conn;
    
    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'admin');
        $this->conn = $db->connect();
        if (!$this->conn) {
            die("Database connection failed");
        }
    }

    public function login(){
        $username = htmlspecialchars(trim($_POST['fullName']));
        $password = htmlspecialchars(trim($_POST['password']));

        $stmt = $this->conn->prepare("SELECT * FROM accounts WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            // echo "Invalid username or password.";
            return;
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            $stmt = $this->conn->prepare("INSERT INTO logs (user_id, username, login_time, login_ip) VALUES (:user_id, :username, NOW(), :login_ip)");
            $stmt->bindParam(':user_id', $user['id']);
            $stmt->bindParam(':username', $user['username']);
            $stmt->bindParam(':login_ip', $_SERVER['REMOTE_ADDR']);
            $stmt->execute();

            header("Location: ?c=home&a=index");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    }

    public function changePassword(){
        
    }

    public function logout(){
        unset($_SESSION['name']);
        header('Location:?c=login');
    }
}
?>