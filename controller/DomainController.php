<?php
class DomainController{
    protected $model;

    public function __construct()
    {
        $this->model = new Domain();
    }

    public function index(){
        $domains = $this->model->all();
        include('views/home');
    }

    public function add() {
                
        include('views/admin/domain/add.php');
        // header('Location: views/admin/add.php');
    }

    public function store(){
        // Validate the data before saving (if applicable)
        // Example: $data = $this->validateInput();
        $rs = $this->model->save();
        if($rs){
            echo json_encode(['status' => 'success', 'message' => 'Success full.']);
        } else {
            $err = "Thêm mới thất bại!";
            include('views/admin/domain/add.php');
            // echo json_encode(['status' => 'error', 'message' => 'Failed to save record.']);
        }
    }
    
    public function update(){
        $id = $_GET['id'];
        $rs = $this->model->upgrade($id);
        if($rs){
            echo json_encode(['status' => 'success', 'message' => 'Record saved successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save record.']);
        }
    }

    public function edit(){
        $id = $_GET['id'];
        if (!isset($id) || empty($id)) {
            die("Invalid ID provided.");
        }
        $domain = $this->model->find($id);
        if ($domain === false) {
            die("User not found.");
        }
        include('views/admin/domain/edit.php');
    }

    public function delete() {
        $id = $_GET['id'];
        if($this->model->destroy($id)){
            header("Location: index.php?c=home"); 
        }
    }
}