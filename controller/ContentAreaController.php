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


    // show the add content are form
    public function addAction()
    {
        // $arrayOfContentAreas = $this->model->getAllContentAreas();

        include '../view/admin/contentviews/addContentAreaView.php';
    }


    // attemp to insert new content area into database
    public function confirmAddAction($user)

    {
    $currentContents=Array();$bool=true;
    $currentContents = $this->model->getAllContentAreas();
    $lastOperationResults="";
    if(isset($_POST["c_name"]) && isset($_POST["c_alias"]) && isset($_POST["c_desc"]) && isset($_POST["c_order"] ))
    {
        foreach($currentContents as $content)
        {
            if ($_POST["c_name"]  == $content->getName())
            {
            $bool=false;
            $lastOperationResults.="Unable to complete request: ContentArea name detected in CMS database<br>";
            }

            if ($_POST["c_alias"]==$content->getAlias())
            {
                $bool=false;
                $lastOperationResults.="Unable to complete request: ContentArea alias detected in CMS database<br>";

            }
        }

        if($bool)

            if(  $lastOperationResults=$this->model->addContentArea(new ContentArea(null,$_POST["c_name"],$_POST["c_alias"],$_POST["c_desc"],null,null,null,$user->getId(),null,$user->getId(),null)))
            {
                $arrayOfContentAreas[0] = $this->model->getContentAreaByName($_POST["c_name"]);
                    $lastOperationResults="Content Area Has Been added";

                include '../view/admin/contentviews/editContentAreaView.php';
            }
        }

        else {

            $arrayOfContentAreas =$this->model->getAllContentAreas();
            include '../view/admin/contentviews/displayContentView.php';

        }
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
