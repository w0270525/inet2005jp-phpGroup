<?php
require_once "../controller/StyleController.php";
require_once "../controller/UserController.php";
require_once "../controller/ArticleController.php";
require_once "../controller/PageController.php";
require_once "../controller/ContentAreaController.php";

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
        $this->contentController= new ContentAreaController() ;
    }
    // Main Controllers content area controoler
    protected $contentController;
    public function contentController()
    {
        return $this->contentController;
    }

    // Main Controllers user controoler
    protected $userController;
    public function userController()
    {
        return $this->userController;
    }


    // main Controllers Article controller
    protected $articleController;
    public function articleController()
    {
        return $this->articleController;
    }

    //page controller
    protected $pageController;
    public function pageController()
    {
        return $this->pageController;
    }

    //style controller
    protected $styleController;
    public function styleController(){
        return $this->styleController;
    }





function updateSecurity()
{
   // $this->currentUser->updateSecurity();
    $this->userController->model->updateUserSecurity( $this->currentUser);
    $this->userController()->model->updateUser( $this->currentUser);
}

    // handle user login
    function confirmUser($user, $pass)
    {
        $pswReset=false;
        $user=$this->userController->model->getUserByUserName($user);
        $yy=$user->getPass();
        $x=$user->getSalt();
        if( $user->getPass()=="password" && $pass == "password")
        {
            $pswReset=true;

        }else {
            //$pass=$user->encrypt($pass);
        }


        if( $pswReset||$user->getPass()== $pass)
        {
            if( ($user->getKey()!="inactive"))
              {
                  $_SESSION["logged"]=serialize(true);
                   $this->currentUser = $user;

                   $_SESSION["grants"]= $this->currentUser->getRoleId();
                    if($pass=="password")
                    {
                       // $bnasd3432er   = md5(uniqid(rand(), true));
                        $bnasd3432er   = "";
                        include("../view/admin/userviews/resetpassword.php");
                    }

            }else if(!$pswReset)
            {
                $this->currentUser->setPass($pass);
                $this->updateSecurity();

            }
        }

        else
        {
            $_SESSION["user"]=null;
            $_SESSION["logged"]=false;
            $this->currentUser = null;
        }
    //    $_SESSION["control"]=serialize($this);
        $_SESSION["user"]=  serialize($this->currentUser );
        return $_SESSION["logged"];
    }


    // login function
    public function login()
    {
        $bnasd3432er   = md5(uniqid(rand(), true));
        include("../view/admin/login.php");
    }

    public function displayAdmin($control)
    {   $tempController= new MainController();
        if(isset($this->currentUser) && isset($_SESSION["logged"]) && $_SESSION["logged"]   )
            include("../_public/adm/admin.php");

    }




    // The current user of the site if  logged in
    public $currentUser = NULL;
    // inACTIVE LOGOFF / COOKIE RESET
    private $userTimeOut = 60000;



}