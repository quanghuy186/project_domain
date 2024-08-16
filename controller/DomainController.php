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

    public function add(){

    }

    public function edit(){

    }

    public function delete(){

    }
}