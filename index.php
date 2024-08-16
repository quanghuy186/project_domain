<?php
session_start();
    require "config/config.php";
    include("db/DB.php");
    include("controller/HomeController.php");
    include("controller/LoginController.php");
    include("controller/LogoutController.php");
    include("controller/AccountController.php");
    include("model/Login.php");
    include("model/Account.php");
    include("model/Redirect.php");
    include("model/Domain.php");
    include("model/Paypal.php");
    include("controller/DomainController.php");
    include("controller/RedirectController.php");
    include("controller/PaypalController.php");
    
    $c = isset($_GET['c']) ? $_GET['c'] : 'login';
    $a = isset($_GET['a']) ? $_GET['a'] : 'index';

    $controller = ucfirst($c)."Controller";
    $action = $a;
    $co = new $controller;
    switch($action){
        case "index":
            $co->$action();
            break;
        case "add":
            $co->$action();
            break;
        case "edit":
            $co->$action();
            break;   
        case "logout":
            $co->$action();
            break; 
        case "xlLogin":
            $co->$action();
            break;
        case "store":
            $co->$action();
            break;
        case "update":
            $co->$action();
            break;
        case "delete":
            $co->$action();
            break;
        case "changePass":
            $co->$action();
            break;
        case "process_pass":
            $co->$action();
            break;
    }

    
?>