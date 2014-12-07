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




// resets the user pasword
function resetPassword($id, $pass)
{
    $attemptedUser = new User($id, null, null, null, $pass, null, null, null, null, null,null,null);
    $this->userController->updateUserSecurity($attemptedUser);

}

 // void = confirmUser(String username);
 // handle user login
 function confirmUser($userName, $pass)
    {
        $attemptedUser = new User(null, null, null, $userName, $pass, null, null, null, null, null,null,null);
        if($this->userController()->confirmUser($attemptedUser)==true)
        {
                $_SESSION["logged"]=serialize(true);
                $attemptedUser=$this->userController()->model->getUserByUserName($attemptedUser->getUsername());
                $_SESSION["grants"]= $attemptedUser->getRoleId();
                 $_SESSION["user"]=serialize($attemptedUser);
                  $this->currentUser=$attemptedUser;

                if($attemptedUser->getPass()==="password")
                {
                    $_SESSION["grants"]=Array(0);
                    $_SESSION["user"]=serialize($attemptedUser);
                    $user=$attemptedUser;
                    include "../view/admin/userviews/resetpassword.php" ;
                    $_SESSION["logged"]=false;
                }else return;
        }
        else
        {
        $_SESSION["user"]=null;
        $_SESSION["logged"]=false;
        $this->currentUser = new User(null, null, null, null, null, null, null, null, null, null,null,null);


//          $_SESSION["user"]=  serialize(new User(null, null, null, $userName, $pass, null, null, null, null, null,null,null) );
//            $currentUser=new User(null, null, null, $userName, $pass, null, null, null, null, null,null,null) ;
             $_SESSION["user"]= serialize($this->currentUser);
        }

        $_SESSION["user"]= serialize($this->currentUser );
        return false;
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


