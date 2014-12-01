<?php

require_once('../model/StyleModel.php');

class StyleController
{
    public $model;

    public function __construct()
    {
        $this->model = new StyleModel();

    }

    public function displayAction()
    {
        $arrayOfStyles = $this->model->getAllStyles();

        include '../view/admin/styleviews/displayStylesView.php';
    }

    // updates the current user to the
//     public function updateAction($userID)
//     {
//        $currentUser = $this->model->getUser($userID);
//
//        include '../view/editCustomer.php';
//     }
//
//    public function commitUpdateAction($custID,$fName,$lName)
//    {
//        $lastOperationResults = "";
//
//        $currentCustomer = $this->model->getCustomer($custID);
//
//        $currentCustomer->setFirstName($fName);
//        $currentCustomer->setLastName($lName);
//
//        $lastOperationResults = $this->model->updateCustomer($currentCustomer);
//
//        $arrayOfCustomers = $this->model->getAllCustomers();
//
//        include '../view/displayCustomers.php';
//    }


}

?>
