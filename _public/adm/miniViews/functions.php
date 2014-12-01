<?php

//light weight function to verify user is logged
// if user is not logged they are redirected to main page
//
function confirmLogin()
{

     $control = unserialize($_SESSION["user"]);$control->currentUser = unserialize($_SESSION["user"]);
    if(isset($_SESSION["logged"]) &&  $_SESSION["logged"])
        if($control->currentUser->isAdmin() || $control->currentUser->isEditor() || $control->currentUser->isAuthor())
        {
            //login confirmed ok to continue
            return true;
        }

    $sessionFile="../sessions/sess_".  $_SESSION["sessionId"] ;
    unlink($sessionFile);

}





// force session logout
//
function forceSessionLogout(){
    session_start();
    $sessionFile="../sessions/sess_".  $_SESSION["sessionId"] ;
    $_SESSION["control"] = serialize(new  MainController());
    $_SESSION["sessionid"] =  null;
    $_SESSION["logged"]=false;
    $_SESSION["grants"]=0;

    // FIND THE SESSION FILE ND DELETE IT FROM THE SYSTEM
    unlink($sessionFile);
    ?>
    <script>
    window.location.reload();
    </script>
    <?php
}



function confirmAction()
 {
     confirmLogin();
     ?>
        Are You Sure you Want To Perform This Action
        <button value="yes" onclick="returnThis(true)"></button><button value="no" onclick="returnThis(false)" ></button>
        <script>
            // script function used to return the value clicked above
            function returnThis($any)
            {
                return  $any;
            }


        </script>
    <?php
 }


// adds a confirm dialogw where inserted
function showConfirmAction()
{

    ?>
        Are You Sure you Want To Perform This Action
        <button value="yes" onclick="returnThis(true)"></button><button value="no" onclick="returnThis(false)" ></button>
        <script>
            // script function used to return the value clicked above
            function returnThis($any)
            {
                return  $any;
            }


        </script>
    <?php
}


// confirms a variable has a value of some sort
function checkVar($any)
{
    if(isset($any) && !empty($any) &&  null!=$any) return true;
    return false;

}



function postRolesToArray()
{
    $roles =array();
    if(isset($_POST["admin"]))
        $roles[]=1;
    if(isset($_POST["editor"]))
        $roles[]=2;
    if(isset($_POST["author"]))
        $roles[]=3;
    return $roles;
}


function checkPostUserNamePassword()
{
    if(!empty($_POST["userName"]) && !empty($_POST["password"]))    return true;
    return false;


}