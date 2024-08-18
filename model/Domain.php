<?php
class Domain{
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
            $stm = $this->conn->query('SELECT * FROM stores');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            error_log("Query failed: " . $e->getMessage());
            return false; // Hoặc throw exception nếu cần
        };
    }

    public function save(){
        $domain_name = $_POST['domain_name'];
        $publicKey = $_POST['public_key'];
        $serverKey = $_POST['serve_key'];
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        // if((empty($domain_name))){
        //     if (isset($_SESSION['error'])) {
        //         $error = $_SESSION['error'];
        //         unset($_SESSION['error']); 
        //     }
            
        // }else{
            $stm = $this->conn->prepare("INSERT INTO stores (domain_name, public_key, serve_key, is_active) VALUES (:domain_name, :public_key, :serve_key, :is_active)");
        $stm->bindParam(':domain_name', $domain_name);
        $stm->bindParam(':public_key', $publicKey);
        $stm->bindParam(':serve_key', $serverKey);
        $stm->bindParam(':is_active', $isActive);
        if ($stm->execute()) {
            header("Location: index.php?c=home"); 
            echo "Failed to add user";
        }
        // }
        
    }

    // public function upgrade($id){
    //     $domain_name = $_POST['domain_name'];
    //     $publicKey = $_POST['public_key'];
    //     $serveKey = $_POST['serve_key'];
    //     $id = $_POST['id'];
    //     $isActive = $_POST['is_active'];
    
    //     $stm = $this->conn->prepare("UPDATE stores SET domain_name = :domain_name, public_key = :public_key, serve_key = :serve_key, is_active = :is_active WHERE id = :id");
        
    //     $stm->bindParam(':id', $id);
    //     $stm->bindParam(':domain_name', $domain_name);
    //     $stm->bindParam(':public_key', $publicKey);
    //     $stm->bindParam(':serve_key', $serveKey);
    //     $stm->bindParam(':is_active', $isActive);
        
    //     if ($stm->execute()) {
    //         echo json_encode(['status' => 'success']);
    //     } else {
    //         echo json_encode(['status' => 'failed']);
    //     }
    // }
    

    public function upgrade($id){
            $domain_name = $_POST['domain_name'];
            $publicKey = $_POST['public_key'];
            $serveKey = $_POST['serve_key'];
            $isActive = isset($_POST['is_active']) ? 1 : 0;
        
            $stm = $this->conn->prepare("UPDATE stores SET domain_name = :domain_name, public_key = :public_key, serve_key = :serve_key, is_active = :is_active WHERE id = :id");
            $stm->bindParam(':id', $id);
            $stm->bindParam(':domain_name', $domain_name);
            $stm->bindParam(':public_key', $publicKey);
            $stm->bindParam(':serve_key', $serveKey);
            $stm->bindParam(':is_active', $isActive);
            
            if ($stm->execute()) {
                header("Location: index.php?c=home");
            } else {
                echo "Failed to update domain information";
            }
    }

    public function find($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM stores WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return false;
        }
    }

    public function destroy($id){
        try {
            $stmt = $this->conn->prepare("DELETE FROM stores WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->rowCount() > 0; 
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return false;
        }
    }
}