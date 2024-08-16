<?php
    class Redirect{
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
                $stm = $this->conn->query('SELECT * FROM stores_redirect');
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                error_log("Query failed: " . $e->getMessage());
                return false; // Hoặc throw exception nếu cần
            };
        }
    
        public function save(){
            $domain_name = $_POST['domain_name'];
            $isActive = isset($_POST['is_active']) ? 1 : 0;
            $stm = $this->conn->prepare("INSERT INTO stores_redirect (domain_name, is_active) VALUES (:domain_name, :is_active)");
            $stm->bindParam(':domain_name', $domain_name);
            $stm->bindParam(':is_active', $isActive);
            if ($stm->execute()) {
                header("Location: index.php?c=redirect"); 
                echo "Failed to add user";
            }
        }
    
        public function upgrade($id){
                $domain_name = $_POST['domain_name'];
                $isActive = isset($_POST['is_active']) ? 1 : 0;
            
                $stm = $this->conn->prepare("UPDATE stores_redirect SET domain_name = :domain_name, is_active = :is_active WHERE id = :id");
                
                $stm->bindParam(':id', $id);
                $stm->bindParam(':domain_name', $domain_name);
                $stm->bindParam(':is_active', $isActive);
                
                if ($stm->execute()) {
                    header("Location: index.php?c=redirect");
                } else {
                    echo "Failed to update domain information";
                }
            
        }
    
        public function find($id) {
            try {
                $stmt = $this->conn->prepare("SELECT * FROM stores_redirect WHERE id = :id");
                $stmt->execute(['id' => $id]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Query failed: " . $e->getMessage());
                return false;
            }
        }
    
        public function destroy($id){
            try {
                $stmt = $this->conn->prepare("DELETE FROM stores_redirect WHERE id = :id");
                $stmt->execute(['id' => $id]);
                return $stmt->rowCount() > 0; 
            } catch (PDOException $e) {
                error_log("Query failed: " . $e->getMessage());
                return false;
            }
        }
    }
?>