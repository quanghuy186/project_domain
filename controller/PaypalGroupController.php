<?php
class PaypalGroupController{
    protected $model;

    public function __construct()
    {
        $this->model = new PaypalGroup();
    }

    public function index(){
        $paypalGroups = $this->model->all();

        include('views/admin/paypalGroup/index.php');
    }


    public function add() {
        include('views/admin/paypalGroup/add.php');
        // header('Location: views/admin/add.php');
    }

    public function store(){
        if(!empty($_POST['group_name'])){
            $rs = $this->model->save();
            if($rs){
                echo json_encode(['status' => 'success', 'message' => 'Success.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save record.']);
            }
        }else{
            include('views/admin/paypalGroup/add.php');
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
        $paypalGroup = $this->model->find($id);
        if ($paypalGroup === false) {
            die("User not found.");
        }
        include('views/admin/paypalGroup/edit.php');
    }

    public function delete() {
        $id = $_GET['id'];
        if($this->model->destroy($id)){
            header("Location: index.php?c=paypalGroup"); 
        }
    }
}