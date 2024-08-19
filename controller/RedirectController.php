<?php
class RedirectController{
    protected $model;

    public function __construct()
    {
        $this->model = new Redirect();
    }

    public function index(){
        $redirects = $this->model->all();

        include('views/admin/redirect/index.php');
    }


    public function add() {
                
        include('views/admin/redirect/add.php');
        // header('Location: views/admin/add.php');
    }

    public function store(){
        if(!empty($_POST['domain_name'])){
            $rs = $this->model->save();
            if($rs){
                echo json_encode(['status' => 'success', 'message' => 'Successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save record.']);
            }
        }else{
            include('views/admin/redirect/add.php');
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
        $redirect = $this->model->find($id);
        if ($redirect === false) {
            die("User not found.");
        }
        include('views/admin/redirect/edit.php');
    }

    public function delete() {
        $id = $_GET['id'];
        if($this->model->destroy($id)){
            header("Location: index.php?c=redirect"); 
        }
    }
}