<?php
require_once "../controller/UserController.php";
require_once "../controller/ArticleController.php";
class MainController
{
    // This class contains a single controller for each of the data models
    // the controllers get moehtds is simpley a call to the name of the controler

    function __construct()
    {
        $this->userController = new UserController();
        $this->articleController = new ArticleController();
    }


    // Main Controllers user controoler
    protected $userController;
    function userController()
    {
        return $this->userController;
    }


    // main Controllers Article controller
    protected $articleController;
    function articleController()
    {
        return $this->articleController;
    }

}