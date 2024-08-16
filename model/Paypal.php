<?php
    class Paypal{
        public $conn;

        public function __construct() {
            $db = new DB('localhost', 'root', '', 'admin');
            $this->conn = $db->connect();
            if (!$this->conn) {
                throw new Exception("Failed to connect to the database.");
            }
        }
    
        public function all(){
            try{
                $stm = $this->conn->query('SELECT * FROM paypal_accounts');
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                error_log("Query failed: " . $e->getMessage());
                return false; // Hoặc throw exception nếu cần
            };
        }
    
        public function save(){
            $paypal_email = $_POST['paypal_email'];
            $isActive = isset($_POST['is_active']) ? 1 : 0;
            $isDied = isset($_POST['is_died']) ? 1 : 0;
            $stm = $this->conn->prepare("INSERT INTO paypal_accounts (paypal_email, is_active, is_died) VALUES (:paypal_email, :is_active, :is_died)");
            $stm->bindParam(':paypal_email', $paypal_email);
            $stm->bindParam(':is_active', $isActive);
            $stm->bindParam(':is_died', $isDied);

            if ($stm->execute()) {
                header("Location: index.php?c=paypal"); 
                echo "Failed to add user";
            }
        }
    
        public function upgrade($id){
                $paypal_email = $_POST['paypal_email'];
                $isActive = isset($_POST['is_active']) ? 1 : 0;
                $isDied = isset($_POST['is_died']) ? 1 : 0;
                $stm = $this->conn->prepare("UPDATE paypal_accounts SET paypal_email = :paypal_email, is_active = :is_active, is_died = :is_died WHERE id = :id");
                
                $stm->bindParam(':id', $id);
                $stm->bindParam(':paypal_email', $paypal_email);
                $stm->bindParam(':is_active', $isActive);
                $stm->bindParam(':is_died', $isDied);
                
                if ($stm->execute()) {
                    header("Location: index.php?c=paypal");
                } else {
                    echo "Failed to update domain information";
                }
        }
    
        public function find($id) {
            try {
                $stmt = $this->conn->prepare("SELECT * FROM paypal_accounts WHERE id = :id");
                $stmt->execute(['id' => $id]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Query failed: " . $e->getMessage());
                return false;
            }
        }
    
        public function destroy($id){
            try {
                $stmt = $this->conn->prepare("DELETE FROM paypal_accounts WHERE id = :id");
                $stmt->execute(['id' => $id]);
                return $stmt->rowCount() > 0; 
            } catch (PDOException $e) {
                error_log("Query failed: " . $e->getMessage());
                return false;
            }
        }
    }
?>