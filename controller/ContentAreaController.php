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
        $arrayOfContentAreas[] = $this->model->getContentArea($_GET["updateContentArea"]);

        include '../view/admin/contentviews/editContentAreaView.php';
    }


    // void addAction();
    // show the add content areA form
    public function addAction()
    {

        include '../view/admin/contentviews/addContentAreaView.php';
    }

    // void confirmAddAction(User user);         -> creates accsible DOM content area object array containing the new Content Panel Object
    // atttemps to insert new content area into database with the current user as the modiferr
    public function confirmAddAction($user)

    {
        $currentContents=Array();$bool=true;
        $currentContents = $this->model->getAllContentAreas();
        $lastOperationResults="";

         // verify data befor entry and check for duplicates
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

            if(  $lastOperationResults=$this->model->addContentArea(new ContentArea(null,$_POST["c_name"],$_POST["c_alias"],$_POST["c_desc"],$_POST["c_order"],null,null,$user->getId(),null,$user->getId(),null)))
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



    public function confirmUpdateAction($ca_name,$ca_desc, $ca_style, $ca_order)
    {
        $true=true;
        $allCA =$this->model->getAllContentAreas();
        foreach($allCA as $content)
        {
            if ($content->getName()==$ca_name)
                if($content->getId()!=$_POST["id"]) $true=false;
        }
        if($true):
            $lastOperationResults = "";
            $currentCA = $this->model->getContentArea($_POST["id"]);
            $currentCA->setName($ca_name);
            $currentCA->setDesc($ca_desc);
            $currentCA->setAlias($_POST["c_alias"]);
            $currentCA->setOrder($ca_order);
            $user= unserialize($_SESSION["user"]);
            $currentCA->setModifiedBy($user->getId());

           // $lastOperationResults = $this->model->updateContentAreaOld($_GET["updateContentArea"],$ca_name,$ca_desc, $ca_style, $ca_order,$user->getId());
            $lastOperationResults = $this->model->updateContentArea($currentCA);

            $_POST=null;
            $_GET=null;
            $arrayOfContentAreas[] =$this->model->getContentArea($currentCA->getId());
            if($lastOperationResults)$lastOperationResults= " You have updated  the Conastnr area successfulyy";
            else $lastOperationResults = "Unable to update the record, please try again";
            include '../view/admin/contentviews/editContentAreaView.php';
        else: $lastOperationResults="That name is already in use, Please try another";
        endif;

    }



    // shows content deletion forme
    public function removeAction($id)
    {
        $arrayOfStyles[]= $this->model->getStyle($id);
        include '../view/admin/styleviews/deleteStyleView.php';
    }

    // removes style from database\\\
    public function removeActionConfirm($id)
    {
        $result= $this->model->removeStyle($id);
        if($result=0) $lastOperationResults = "Unable to delete the record, please try again";
        else if($result=9999) $lastOperationResults = "Unable to delete the record, please remove it as active";
        else $lastOperationResults=$result.  " rows effectedf";

        if($result!=0):
            $arrayOfStyles= $this->model->getAllStyles();
            $this->displayAction();
            $_GET=null;$_POST=NULL;
        else:
            $arrayOfStyles= $this->model->getStyle($id);
            include "../view/admin/styleviews/deleteStyleView.php";
        endif;

    }

}

?>
