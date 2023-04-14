<?php
session_start();
require '../models/User.php';
require '../dbconfig.php';
class LoginController
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login()
    {
        if ($this->user->isAuthenticated()) {
            $_SESSION["user"]=$this->user->getemail();
            $_SESSION["role"]=$this->user->getRole();
            if($this->user->getRole()==='customer')
            {
                $_SESSION["orders"]=$this->user->getOrders();
            }
            header("location: ../views/Dashboard.php");
        } else {
            echo "Wrong username or password";
        }
    }
}
$user= new User($_REQUEST['email'], $_REQUEST['password']);
$loginController = new LoginController($user);
if(isset($_POST['email']))
{
    $loginController->login();
}
else
{
    if(isset($_GET['logout']))
    {
        session_destroy();
        header('Location: /src/views/Login.php');
    }
}









?>