<?php
//this file contains basic functions  and classes that can be shared between different PDO's

// DATA BASE CONNECTION OBJECT
class connect{
    protected $dbConnection;

    // conects to the cms
	public function connectToDB()
	{
		if (CMS_checkAdmin() || CMS_checkEditor()) {
			try {
				$this->dbConnection = new PDO("mysql:host=localhost;dbname=cms", "backend", "inet2005");
				$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $ex) {
				die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
			}
		}
		else if (CMS_checkAuthor())
		{
			try {
				$this->dbConnection = new PDO("mysql:host=localhost;dbname=cms", "frontend", "inet2005");
				$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $ex) {
				die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
			}
		} else {
			try {
				$this->dbConnection = new PDO("mysql:host=localhost;dbname=cms", "frontend", "inet2005");
				$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $ex) {
				die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
			}
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