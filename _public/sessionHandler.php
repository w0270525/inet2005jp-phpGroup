<?php

// include this file to handle session varibles and handle persistant controler.
// access the controler and sesion vaibles after this file is includefl
if(session_status()==PHP_SESSION_NONE) {
    session_save_path("../sessions");
    session_start();
}

require "../controller/MainController.php" ;

$showLoginBar=false;
// init the controller for the session
// must be serialized in session varible
$sessionID = session_id();
if (!isset($_SESSION["sessionId"]) ||!isset($_SESSION["control"]))
{
    $_SESSION["sessionId"] =session_id();
    $_SESSION["control"] = serialize(new  MainController());
    $_SESSION["logged"]=false;
}

// clears the current login
// resets all session variables resets controller and forces page reset
if($_SERVER["REQUEST_METHOD"]=="POST")
if(isset($_POST["logout"]))
    {


    $sessionFile="../sessions/sess_".  $_SESSION["sessionId"] ;
    $_SESSION["control"] = serialize(new  MainController());
    $_SESSION["sessionid"] =  null;
    $_SESSION["logged"]=false;
    $_SESSION["grants"]=0;
    $showLoginBar=true;
    // FIND THE SESSION FILE ND DELETE IT FROM THE SYSTEM
    unlink($sessionFile);
    header("refresh: 0;");
}


//create local non serialize controller for use
$control = unserialize( $_SESSION["control"]);

//add the session user to the unserilzed controller
if(isset($_SESSION["user"])){
    if(unserialize($_SESSION["user"]))
    {
        if (unserialize($_SESSION["user"])->getId()==null)
        {
            unset($_SESSION["user"]);
            $_SESSION["logged"]=false;
        }
    }
    //else reestablish user

}





//Ensures logout if seesion invalild
if(!isset($_SESSION["logged"])) $_SESSION["logged"]=false;

$tempController =new MainController();

//HANDLES ADMIN LOGIN AND FUNCTIONALITY
if(isset($_POST["authorName"]) && isset($_POST["passwordAuthor"]))
    $_SESSION["logged"] = $control->confirmUser($_POST["authorName"],$_POST["passwordAuthor"]);

if($_SERVER["REQUEST_URI"]=="/admin" && isset($_SESSION["logged"]) && $_SESSION["logged"]==false)
{
    // login
    if(CMS_checkPostUserNamePassword())
        $_SESSION["logged"] = $control->confirmUser($_POST["userName"],$_POST["password"]);

    if( !isset($_SESSION["logged"]) || $_SESSION["logged"]==null || $_SESSION["logged"]==false)
        $control->login();

}


// shows the login bar
if(!isset($_SESSION["logged"])||$_SESSION["logged"]==false)
{
    $showLoginBar=true;
}

if(isset($_POST["passVerify"]) && isset($_POST["pass"]) && ($_POST["passVerify"] == $_POST["pass"]) && isset($_POST["passwordReset"])){
  //  $name = $tempController->userController()->model->getUserById( $_POST["userName"])->getUsername();
    $control->resetPassword($_POST["userName"] ,$_POST["passVerify"]);

}