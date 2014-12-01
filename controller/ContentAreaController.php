<?php

require_once('../model/ContentAreaModel.php');

class ContentAreaController
{
    public $model;

    public function __construct()
    {
        $this->model = new ContentAreaModel();

    }

    public function displayAction()
    {
        $arrayOfContentAreas = $this->model->getAllContentAreas();

        include '../view/admin/contentviews/displayContentView.php';
    }

    public function updateAction($id)
    {
        $arrayOfContentAreas = $this->model->getContentArea($id);

        include '../view/admin/contentviews/editContentAreaViews.php';
    }



    public function addAction()
    {
        // $arrayOfContentAreas = $this->model->getAllContentAreas();

        include '../view/admin/contentviews/addContentAreaView.php';
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
