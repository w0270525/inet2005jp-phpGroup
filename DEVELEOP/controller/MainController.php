<?php
require_once "../controller/UserController.php";
class MainController
{
    protected $userController;

    function __construct()
    {
        $this->userController = new UserController();
    }

    function userController()
    {
        return $this->userController;
    }

}
