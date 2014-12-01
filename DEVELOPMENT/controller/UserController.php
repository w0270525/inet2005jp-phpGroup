<?php

require_once('../model/UserModel.php');

class UserController
{
    public $model;
    
    public function __construct()
    {
        $this->model = new UserModel();

    }
    
    public function displayAction()
    {
        $arrayOfUsers = $this->model->getAllUsers();

        include '../view/admin/userviews/displayUser.php';
    }

    public function displayAdvancedAction($UserId)
    {
        $fetchedUser = $this->model->getUser($UserId);

        include '../view/admin/userviews/userViewAdvanced.php';
    }


    public function getUserRoles()
    {

    }



      // updates the current user to the


    public function commitUpdateAction($userId,$fName,$lName,$createdBy,$roles, $createdby, $current_User)
    {

        $lastOperationResults = "";
        $currentUser = $this->model->getUser($userId);
        $currentUser->setFirstName($fName);
        $currentUser->setLastName($lName);
        $currentUser->setRoleId($roles);
        $currentUser->setCreatedBy($createdBy);
        $arrayOfUsers = $this->model->getAllUsers();
        $lastOperationResults = $this->model->updateUser($currentUser);
        $_POST=null;
        $_GET["update"]=$userId;
        $fetchedUser=$this->model->getUser($userId);
        include '../view/admin/userviews/userViewAdvanced.php';

        // force logout if user changes their own rights;
        if ($userId==$current_User)
        {
            include '../view/admin/userviews/loginToRefreshView.php';
            forceSessionLogout();
        }
    }

    public function addNewUser()
    {

          //  $bnasd3432er   = md5(uniqid(rand(), true));

        $bnasd3432er   = md5(uniqid(rand(), true));

            include("../view/admin/userviews/addNewUser.php");
    }

    public function confirmNewUser($currentUser)
    {
        date_default_timezone_set('UTC');
        $array = array(null, $_POST['FirstName'],$_POST['LastName'], $_POST['userName'],"",md5(uniqid(rand(), true)),
            $currentUser->getId(),date_default_timezone_get(),$currentUser->getId(),date_default_timezone_get(),$_POST["roles"]);
        $this->model->constructUserArray($array);
        $this->model->addUser(  $this->model->constructUserArray($array));





    }



}


?>


