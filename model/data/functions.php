<?php
//this file contains basic functions and classes that can be shared between different PDO's
// DATA BASE CONNECTION OBJECT
class connect {
    protected $dbConnection;
// conects to the cms
    public function connectToDB()
    {
        if (isset($_SESSION["user"]) && (CMS_checkEditor() || CMS_checkAdmin())) {
            try {
                $this->dbConnection = new PDO("mysql:host=localhost;dbname=cms", "backend", "inet2005");
                $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
            }
        }
        else if (isset($_SESSION["user"]) && CMS_checkAuthor())
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
// Boolean = CMS_checkEditor();
// returns the current useres editor status
function CMS_checkEditor()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && CMS_getUser()->isEditor())
        return true;
    return false;
}
// Boolean = CMS_checkAdmin();
// returns the current user Admin status
function CMS_checkAdmin()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true && isset($_SESSION["user"])&& isset($_SESSION["control"])&& CMS_getUser()->isAdmin())
        return true;
    return false;
}
// Boolean = CMS_checkAuthor();
// returns the current users author status
function CMS_checkAuthor()
{
    if(isset ($_SESSION["logged"]) && $_SESSION["logged"]==true  && isset($_SESSION["user"])&& isset($_SESSION["control"]) && CMS_getUser()->isAuthor())
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





function CMS_postFormHelperFunction($post)
{
    if(!isset($post["all_page"]))$post["all_page"] = 0;
    else if($post["all_page"]=="on" ) $post["all_page"] = 1;
    if(!isset($post["a_inactive"]))$post["a_inactive"] = 0;
    else   $post["a_inactive"] = 1;
    if(!isset($post["admin"]))$post["admin"] = 0;
    else if($post["admin"]=="on" ) $post["admin"] = 1;
    if(!isset($post["editor"]))$post["editor"] = 0;
    else if($post["editor"]=="on")$post["editor"] = 1;
    if(!isset($post["author"]))$post["author"] = 0;
    else if($post["author"]=="on")$post["author"] = 1;
    if(!isset($post["active"]))$post["active"] = "inactive";
    else if($post["active"]=="on")$post["active"] ="good";
    return $post;
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


// Boolean CMS_hideAuthor();
// return whether or not author has selected to hide main page display buttons
function CMS_hideAuthor(){
    if(isset($_COOKIE["hideAuthor"]) && $_COOKIE["hideAuthor"]==true) return true;
    return false;
}



function CMS_postRolesToArray()
{
    $roles = array();
    if(isset($_POST["admin"]))
        $roles[] = 1;
    if(isset($_POST["editor"]))
        $roles[] = 2;
    if(isset($_POST["author"]))
        $roles[] = 3;
    return $roles;
}


function CMS_checkPostUserNamePassword()
{
    if(!empty($_POST["userName"]) && !empty($_POST["password"])) return true;
    return false;
}

function CMS_confirmLogin()
{

    $control = unserialize($_SESSION["user"]);
    $control->currentUser = unserialize($_SESSION["user"]);

    if(isset($_SESSION["logged"]) &&  $_SESSION["logged"])
        if($control->currentUser->isAdmin()
            || $control->currentUser->isEditor()
            || $control->currentUser->isAuthor())
        {
            // login confirmed ok to continue
            return true;
        }

    $sessionFile = "../sessions/sess_" . $_SESSION["sessionId"] ;
    unlink($sessionFile);
}


// force session logout
function CMS_forceSessionLogout()
{
    session_start();
    $sessionFile = "../sessions/sess_" . $_SESSION["sessionId"];
    $_SESSION["control"] = serialize(new MainController());
    $_SESSION["sessionid"] =  null;
    $_SESSION["logged"] = false;
    $_SESSION["grants"] = 0;

    // FIND THE SESSION FILE ND DELETE IT FROM THE SYSTEM
    unlink($sessionFile);
    ?>
    <script>
        window.location.reload();
    </script>
<?php
}


function CMS_checkVar($any)
{
    if(isset($any) && !empty($any) && null!=$any) return true;
    return false;
}




