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
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && getUser()->isEditor())
        return true;
    return false;
}


// Boolean  = CMS_checkAdmin();
//  returns the current user Admin status
function CMS_checkAdmin()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && getUser()->isAdmin())
        return true;
    return false;
}


// Boolean = CMS_checkAuthor();
//  returns the current users author status
function CMS_checkAuthor()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && getUser()->isAuthor())
        return true;
    return false;
}

// User = getUser();
// returns the current user
function getUser()
{
    return unserialize($_SESSION["user"]);
}
