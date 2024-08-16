<?php
class Account {
    public $conn;

    public function __construct() {
        $db = new DB('localhost', 'root', '', 'admin');
        $this->conn = $db->connect();
        if (!$this->conn) {
            throw new Exception("Failed to connect to the database.");
        }
    }

    public function all() {
        try {
            $stm = $this->conn->prepare("SELECT * FROM accounts");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return false; // Hoặc throw exception nếu cần
        }
    }

    public function find($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM accounts WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return false;
        }
    }
    
    public function destroy($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM accounts WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->rowCount() > 0; 
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return false;
        }
    }

    public function changePassword(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
        
            $stmt = $this->conn->prepare("SELECT * FROM accounts WHERE id = :user_id");
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if (password_verify($oldPassword, $user['password'])) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $this->conn->prepare("UPDATE accounts SET password = :password WHERE id = :user_id");
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':user_id', $_SESSION['user_id']);
                $stmt->execute();
                echo "Đổi mật khẩu thành công!";
                header("Location: ?c=home");
            } else {
                echo "Mật khẩu cũ không đúng.";
            }
        }
    }
}
?>