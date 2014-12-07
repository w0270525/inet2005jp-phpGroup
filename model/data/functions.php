<?php
//this file contains basic functions  and classes that can be shared between different PDO's

// DATA BASE CONNECTION OBJECT
class connect{
    protected $dbConnection;

    // conects to the cms
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("mysql:host=localhost;dbname=cms","root","inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
        }

    }
    function getConnection()
    {
        return $this->dbConnection;
    }

    // closes the database connection
    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }



}

// Boolean  = CMS_checkEditor();
//  returns the current useres editor status
function CMS_checkEditor()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && CMS_getUser()->isEditor())
        return true;
    return false;
}


// Boolean  = CMS_checkAdmin();
//  returns the current user Admin status
function CMS_checkAdmin()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && CMS_getUser()->isAdmin())
        return true;
    return false;
}


// Boolean = CMS_checkAuthor();
//  returns the current users author status
function CMS_checkAuthor()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && CMS_getUser()->isAuthor())
        return true;
    return false;
}

// User = CMS_getUser();
// returns the current user
function CMS_getUser()//USER
{
    return unserialize($_SESSION["user"]);
}


// void CMS_postGetReset();
// clears post and get globals to help with form reset
function CMS_postGetReset()
{
    $_POST=null;$_GET=null;
}



// String = CMS_getMainStyle();
// returns the value of  styleController()->getActiveStyle()->getStyle();
function CMS_getMainStyle()
{
    $control = unserialize($_SESSION["control"]);
    $mainStyle = $control->styleController()->getActiveStyle()->getStyle();
    if($mainStyle!=null) return $mainStyle;
    return "";

}


// Boolean endsWith(String checkString, String compareString);
// returns true if the compare checkString ends with the compareString
function CMS_STR_endsWith($checkString, $compareString)
{
    $length = strlen($compareString);
    if ($length == 0) {
        return true;
    }

    return (substr($checkString, -$length) === $compareString);
}

// $var = CMS_ID(AnyType any)
// returns the value of ->getId or returns NULL
// if (CMS_ID{$x)) currentId = $x CMS_ID($x);
//function CMS_ID($any)
//{
//    try{
//        if($any->getId())
//            return ($ant->getId())
//    }catch  (ErrorException $e){
//        return NULL;
//    }
//}

// $_POST = CMS_postFormHelperFunction($_POST)
// process the $_Post gloabls a_inactive add all_pageto int
function CMS_postFormHelperFunction($post)
{
    if(!isset($post["all_page"]))$post["all_page"] = 0;
    else if($post["all_page"]=="on" ) $post["all_page"] = 1;
    if(!isset($post["a_inactive"]))$post["a_inactive"] = 0;
    else if($post["a_inactive"]=="on" ) $post["a_inactive"] = 1;
    return $post;
}