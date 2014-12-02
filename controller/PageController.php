<?php

require_once('../model/PageModel.php');

class PageController
{
    public $model;

    public function __construct()
    {
        $this->model = new PageModel();

    }

    public function displayAction()
    {
        $arrayOfPages = $this->model->getAllPages();

        include '../view/admin/pageviews/displayPageView.php';
    }

    public function updateAction($id)
    {
        $arrayOfPages = array();
        $arrayOfPages[]=$this->model->getPage($id);


        include '../view/admin/pageviews/editPageViews.php';
    }
    public function addAction()
    {


        include '../view/admin/pageviews/addPageView.php';
    }


    public function confirmAddAction($user)
    {
        $currentPages=Array();$bool=true;
        $currentPages = $this->model->getAllPages();
        $lastOperationResults="";
        foreach($currentPages as $page)
        {
            if ($_POST["p_name"]==$page->getName())
            {
                $bool=false;
                $lastOperationResults.="Unable to complete request: Page name detected in CMS database<br>";
            }

            if ($_POST["p_alias"]==$page->getAlias())
            {
                $bool=false;
                $lastOperationResults.="Unable to complete request: Page alias detected in CMS database<br>";

            }
        }

        if($bool && isset($_POST["p_name"]) && isset($_POST["p_alias"]) && isset($_POST["p_desc"])  )

        {

           if(  $lastOperationResults=$this->model->addPage(new Page(null,$_POST["p_name"],$_POST["p_alias"],$_POST["p_desc"],null,null,$user->getId(),null,$user->getId(),null.null)))
            {
            $arrayOfPages[0] = $this->model->getPageByName($_POST["p_name"]);
            include'../view/admin/pageviews/editPageViews.php';
        }
        }

            else {

                $arrayOfPages =$this->model->getAllPages();
                include '../view/admin/pageviews/displayPageView.php';

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
