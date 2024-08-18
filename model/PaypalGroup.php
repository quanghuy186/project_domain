<?php
    class PaypalGroup{
        public $conn;

        public function __construct() {
            $db = new DB('localhost', 'root', '', 'admin');
            $this->conn = $db->connect();
            if (!$this->conn) {
                throw new Exception("Failed to connect to the database.");
            }
        }
    
        public function all(){
            // SELECT g.group_name FROM paypal_accounts p JOIN paypal_group g ON p.paypal_group_id = g.id;
            try{
                $stm = $this->conn->query('SELECT * FROM paypal_group');
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                error_log("Query failed: " . $e->getMessage());
                return false; 
            };
        }
    
        public function save(){
            $group_name = $_POST['group_name'];
            // $time_stamp = isset($_POST['time_stamp']) ? intval($_POST['time_stamp']) : '';
            // $stm = $this->conn->prepare("INSERT INTO paypal_group (group_name, time_stamp) VALUES (:group_name, :time_stamp)");
            $stm = $this->conn->prepare("INSERT INTO paypal_group (group_name) VALUES (:group_name)");
            $stm->bindParam(':group_name', $group_name);
            // $stm->bindParam(':time_stamp', $time_stamp);
            if ($stm->execute()) {
                header("Location: index.php?c=paypalGroup"); 
                echo "Failed to add user";
            }
        }
    
        public function upgrade($id){
                // $group_name = $_POST['group_name'];
                // $stm = $this->conn->prepare("UPDATE paypal_group SET group_name = :group_name WHERE id = :id");
                // $stm->bindParam(':id', $id);
                // $stm->bindParam(':group_name', $group_name);
                // if ($stm->execute()) {
                //     header("Location: index.php?c=paypalGroup");
                // } else {
                //     echo "Failed to update domain information";
                // }

                // $id = isset($_GET['id']) ? $_GET['id'] : null;
                $group_name = isset($_POST['group_name']) ? $_POST['group_name'] : null;
            
                // Kiểm tra nếu ID và group_name không phải là null
                if ($id === null || $group_name === null) {
                    echo "Invalid input data.";
                    return;
                }
            
                // Chuẩn bị câu lệnh SQL để cập nhật dữ liệu
                $sql = "UPDATE paypal_group SET group_name = :group_name WHERE id = :id";
                $stm = $this->conn->prepare($sql);
                
                // Gán giá trị cho các tham số
                $stm->bindParam(':group_name', $group_name);
                $stm->bindParam(':id', $id);
                
                // Thực hiện câu lệnh SQL và kiểm tra kết quả
                if ($stm->execute()) {
                    header("Location: index.php?c=paypalGroup");
                    exit(); // Dừng việc thực thi script sau khi chuyển hướng
                } else {
                    // Ghi log lỗi nếu câu lệnh không thành công
                    error_log("Failed to update user: " . implode(", ", $stm->errorInfo()));
                    echo "Failed to update user";
                }
        }
    
        public function find($id) {
            try {
                $stmt = $this->conn->prepare("SELECT * FROM paypal_group WHERE id = :id");
                $stmt->execute(['id' => $id]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Query failed: " . $e->getMessage());
                return false;
            }
        }
    
        public function destroy($id){
            try {
                $stmt = $this->conn->prepare("DELETE FROM paypal_group WHERE id = :id");
                $stmt->execute(['id' => $id]);
                return $stmt->rowCount() > 0; 
            } catch (PDOException $e) {
                error_log("Query failed: " . $e->getMessage());
                return false;
            }
        }
    }
?>