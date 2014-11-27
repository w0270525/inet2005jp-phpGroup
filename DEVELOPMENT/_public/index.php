<?php
include_once ("../controller/MainController.php");
$control = new MainController();
if(!isset($_GET['page'] )||empty($_GET['page'] ))
{
   $_GET['page'] =1;
}
if($_SERVER["REQUEST_URI"]=="/admin")
{
    if(!empty($_POST["username"]) && !empty($_POST["password"]))
    {
       global $control ;
        $_SESSION["logged"] =$control->confirmUser($_POST["username"],$_POST["password"]);
    }
    if (!isset($_SESSION["logged"])||(!$_SESSION["logged"]==false))
    include ("../view/admin/login.php");
}
//$control->userController()->displayAction();

//$control->articleController()->displayAction();

//$control->pageController()->displayAction();

//$control->styleController()->displayAction();
include("./adm/admin.php");
include("../view/displayPage.php");