<?php
require_once "../controller/StyleController.php";

require_once "../controller/UserController.php";

require_once "../controller/ArticleController.php";
require_once "../controller/PageController.php";
require_once "../controller/ContentAreaController.php";
require_once "../controller/ChartController.php";

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
	    $this->chartController = new ChartController();
        $this->currentUser=NEW User(null,null,null,null,null,null,null,null,null,null,null,null);
    }
    // Main Controllers content area controller
    protected $contentController;
    public function contentController()    {
        return $this->contentController;
    }

    // Main Controllers user controller
    protected $userController;
    public function userController()    {
        return $this->userController;
    }




    // main Controllers Article controller
    protected $articleController;
    public function articleController()  {
        return $this->articleController;
    }

    //page controller
    protected $pageController;
    public function pageController()    {
        return $this->pageController;
    }

    //style controller
    protected $styleController;
    public function styleController(){
        return $this->styleController;
    }

	//chart controller
	protected $chartController;
	public function chartController()
	{
		return $this->chartController;
    }

    // void addArticle()
    //adds an article
    public function addArticle()
    {      if(isset($_POST["p_name"]) && isset($_POST["p_alias"]) && isset($_POST["p_desc"]))
                    $this->pageController->confirmAddAction($_POST["p_name"] ,$_POST["p_alias"] ,$_POST["p_desc"]);
    }

    // void = confirmNewUser(User user);
    // adda a new user into the database
    function confirmNewUser($user)
    {   $roles=CMS_postRolesToArray();
        $newUser = new User(null, $user['userName'] ,$user['FirstName'],$user['LastName'],"password","" , CMS_getUser()->getId(), null,CMS_getUser()->getId(),null,$roles,$user['active']);
        $this->userController->confirmNewUser($newUser);
    }

    // removeArticle()
    //deletes an article
    public function removeArticle()
    {   if(isset( $_POST["id"]))
            $this->pageController->removeConfirmAction( $_POST["id"]);
    }

    // resetPassword(Integer userId, String password)
    // resets the user password
    function resetPassword($id, $pass)
    {   $attemptedUser = new User($id, null, null, null, $pass, null, null, null, null, null,null,null);
        $this->userController->updateUserSecurity($attemptedUser);

    }

 // void = confirmUser(String username);
 // handle user login
 function confirmUser($userName, $pass)
    {
        $tryUser = new User(null, null, null, $userName, $pass, null, null,  null, null, null,array(0,0,0),null);
        if($this->userController()->confirmUser($tryUser)===1)
        {
                $_SESSION["logged"]=serialize(true);
                $attemptedUser=$this->userController()->model->getUserByUserName($tryUser->getUsername());
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
                }else return $_SESSION["logged"];
        }
        else
        {
            $this->currentUser=$tryUser;
            $_SESSION["user"]=null;
            $_SESSION["logged"]=false;
            $_SESSION["user"]= serialize($this->currentUser);
        }

        $_SESSION["user"]= serialize($this->currentUser );
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
        if(isset($this->currentUser) && isset($_SESSION["logged"]) && $_SESSION["logged"]==serialize(true)   )
            include("../_public/adm/admin.php");

    }


    // The current user of the site if  logged in
    public $currentUser = NULL;
    // inACTIVE LOGOFF / COOKIE RESET
    private $userTimeOut = 60000;



}


