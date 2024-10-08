<?php
class PaypalController{
    protected $model;
    protected $paypalGroup;

    public function __construct()
    {
        $this->model = new Paypal();
        $this->paypalGroup = new PaypalGroup();
    }

    public function index(){
        $paypals = $this->model->all();
        
        include('views/admin/paypal/index.php');
    }

    public function add() {
        $paypalGroups = $this->paypalGroup->all();
        include('views/admin/paypal/add.php');
        // header('Location: views/admin/add.php');
    }

    public function store(){
            $rs = $this->model->save();
            if($rs){
               
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save record.']);
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
        // lay ra paypal_group_id
        $paypalGroups = $this->paypalGroup->all();
        $currentPaypalGroupId = $this->model->getId($id);
        $paypal = $this->model->find($id);
        if ($paypal === false) {
            die("User not found.");
        }
        include('views/admin/paypal/edit.php');
    }

    public function delete() {
        $id = $_GET['id'];
        if($this->model->destroy($id)){
            header("Location: index.php?c=paypal"); 
        }
    }
}