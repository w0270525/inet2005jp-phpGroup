<?php

require_once('../model/ArticleModel.php');

class ArticleController
{
    public $model;

    public function __construct()
    {
        $this->model = new ArticleModel();

    }

    public function displayAction()
    {
        $arrayOfArticles = $this->model->getAllArticles();

        include '../view/admin/articleviews/displayArticlesView.php';
    }

    public function updateAction($id)
    {
        $article =$this->model->getPage($id);


        include '../view/admin/articleviews/editArticleView.php';
    }

    public function addAction()
    {


        include '../view/admin/articleviews/addArticleView.php';
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
