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





      // updates the current user to the


    public function commitUpdateAction($userId,$fName,$lName,$createdBy,$roles, $createdby, $current_User,$key)
    {

        $lastOperationResults = "";
        $currentUser = $this->model->getUser($userId);
        $currentUser->setFirstName($fName);
        $currentUser->setLastName($lName);
        $currentUser->setRoleId($roles);
        $currentUser->setCreatedBy($createdBy);
        $currentUser->setKey($key);
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
            CMS_forceSessionLogout();
        }
    }

    // loads the view to add a new user
    public function addNewUser()
    {
        $bnasd3432er   = md5(uniqid(rand(), true));
        include("../view/admin/userviews/addNewUser.php");
    }


    // void = confirmUser(Array mixed)
    // adds a user ti the databse
    // user infor based on POST variable
    public function confirmNewUser($currentUser)
    {
        $result=$this->model->addUser(  $currentUser);
    }




    // boolean confirmUser(User user)
    // returns true of false if the user is equal to the user in the databse
    public function confirmUser($user)
    {
        if($this->model->confirmUser($user) )
            return 1;
        return 0;
    }



    //Updaes user password and salt;
    public function updateUserSecurity($user)
    {    $this->model->updateUserSecurity($user);
    }


    public function resetPass($user,$pass)
    {
    }

    // loads the remove user form
    public function getRemoveUser($id)
    {    $arrayOfUserObjects[]=$this->model->getUser($id);
        include "../view/admin/userviews/deleteUserView.php";
    }

    public function removeUser($userName)
    {    if( $this->model->removeUser($userName))
            $lastOperationsSesults="User Remove";
        else;
            $lastOperationsSesults="User Was Not Removed";
    }


    public function toggleUserInactivity($id)
    {
        return $this->model->setActive();
    }



}


?>


