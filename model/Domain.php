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
            $stm = $this->conn->query('SELECT * FROM domains');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            error_log("Query failed: " . $e->getMessage());
            return false; // Hoặc throw exception nếu cần
        };
    }

    public function find(){
        
    }
}