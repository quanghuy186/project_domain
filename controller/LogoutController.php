<?php
    class LogoutController{
        protected $model;
        public function __construct()
        {
            $this->model = new Login();
        }

        public function logout(){
            $this->model->logout();
            header('Location: ?c=login');
        }
    } 