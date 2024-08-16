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
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $cpassword = $_POST['cpassword'];

        if($newPassword == $cpassword){
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
                    
                    $_SESSION['notification'] = [
                        'message' => 'Thao tác của bạn đã được thực hiện thành công.',
                        'type' => 'success',
                        'start_time' => time(),
                        'end_time' => time() + 3 
                    ];
                    $stmt->execute();
                    header("Location: ?c=home");
                } else { 
                    $err = "Mật khẩu cũ không đúng.";
                    $_SESSION['error'] = [
                        'message' => $err,
                        'type' => 'danger',
                        'start_time' => time(),
                        'end_time' => time() + 3 
                    ];
                    header("Location: ?c=account&a=changePass");
                }
            }
        }else{
            $err = "Vui lòng nhập đúng mật khẩu";
            $_SESSION['error'] = [
                'message' => $err,
                'type' => 'danger',
                'start_time' => time(),
                'end_time' => time() + 3 
            ];
            header("Location: ?c=account&a=changePass");
        }
    }
}
?>