<?php
require_once "../controller/StyleController.php";
require_once "../controller/UserController.php";
require_once "../controller/ArticleController.php";
require_once "../controller/PageController.php";

class MainController
{
    // This class contains a single controller for each of the data models
    // the controllers get moehtds is simpley a call to the name of the controler

    function __construct()
    {
        $this->userController = new UserController();
        $this->articleController = new ArticleController();
        $this->pageController = new PageController();
        $this->styleController= new StyleController();
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

    //page controller
    protected $pageController;
    function pageController()
    {
        return $this->pageController;
    }

    //style controller
    protected $styleController;
    function styleController(){
        return $this->styleController;
    }



    function confirmUser($user, $pass)
    {
        $_SESSION["logged"]=$this->userController->model->getUserByUserName($user)->getPass()== $pass &&
            $this->userController->model->getUserByUserName($user)->getUsername();
        if($_SESSION["logged"])
        $user = $this->userController->model->getUserByUserName($user);

        if( $_SESSION["logged"])$_SESSION["grants"]=$user->getRoleId();
        else $_SESSION["logged"]=false;
        return $_SESSION["logged"];
    }
    // The current user of the site if  logged in
    public $currentUserName = NULL;
    // inACTIVE LOGOFF / COOKIE RESET
    private $userTimeOut = 60000;
}
