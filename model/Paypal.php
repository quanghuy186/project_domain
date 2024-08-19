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
            $sql = "SELECT paypal_accounts.*,  paypal_group.group_name FROM paypal_accounts JOIN paypal_group ON paypal_accounts.paypal_group_id = paypal_group.id";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function save() {
            $paypal_group_id = $_POST['paypal_group_id'];
            $paypal_email = $_POST['paypal_email'];
            $isActive = isset($_POST['is_active']) ? 1 : 0;
            $isDied = isset($_POST['is_died']) ? 1 : 0;
            $is_sandbox = isset($_POST['is_sandbox']) ? 1 : 0;
        
            $sql = "INSERT INTO paypal_accounts (paypal_group_id, paypal_email, is_active, is_died, is_sandbox) 
                    VALUES (:paypal_group_id, :paypal_email, :is_active, :is_died, :is_sandbox)";
            $stm = $this->conn->prepare($sql);
        
            $stm->bindParam(':paypal_group_id', $paypal_group_id);
            $stm->bindParam(':paypal_email', $paypal_email);
            $stm->bindParam(':is_active', $isActive);
            $stm->bindParam(':is_died', $isDied);
            $stm->bindParam(':is_sandbox', $is_sandbox);
        
            if ($stm->execute()) {
                header("Location: index.php?c=paypal"); 
                exit(); 
            } 
        }
        
        public function upgrade($id){
                $paypal_email = $_POST['paypal_email'];
                $paypal_group_id = $_POST['paypal_group_id'];
                $isActive = isset($_POST['is_active']) ? 1 : 0;
                $is_died = isset($_POST['is_died']) ? 1 : 0;
                $is_sandbox = isset($_POST['is_sandbox']) ? 1 : 0;
                $stm = $this->conn->prepare("UPDATE paypal_accounts SET paypal_email = :paypal_email, paypal_group_id = :paypal_group_id, is_active = :is_active, is_died = :is_died, is_sandbox = :is_sandbox WHERE id = :id");
                $stm->bindParam(':id', $id);
                $stm->bindParam(':paypal_group_id', $paypal_group_id);
                $stm->bindParam(':paypal_email', $paypal_email);
                $stm->bindParam(':is_active', $isActive);
                $stm->bindParam(':is_died', $is_died);
                $stm->bindParam(':is_sandbox', $is_sandbox);
                
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

        public function getId($id) {
            try {
                $stmt = $this->conn->prepare("
                    SELECT paypal_group.id 
                    FROM paypal_group 
                    JOIN paypal_accounts 
                    ON paypal_group.id = paypal_accounts.paypal_group_id
                    WHERE paypal_accounts.id = :id;
                ");
                // Gán giá trị $id vào placeholder :id
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
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