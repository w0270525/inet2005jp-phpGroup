<?php

require_once('../model/ArticleModel.php');

class ArticleController
{
    public $model;

    public function __construct()
    {
        $this->model = new ArticleModel();

    }

        // display all articles
    public function displayAction()
    {
        $arrayOfArticles = $this->model->getAllArticles();

        include '../view/admin/articleviews/displayArticlesView.php';
    }

    // disokay the add article form
    public function addAction()
    {

        include '../view/admin/articleviews/addArticleDisplay.php';
    }


    public function updateAction()
    {
        $arrayOfArticles[0]=$this->model->getArticle($_GET["articleupdate"]);
        include ("../view/admin/articleviews/editArticleView.php");
    }







    public function confirmAddAction($user)
    {

        $result=null;
         // validate info befor adding a record
        if(isset ($_POST["a_name"]) &&    isset($_POST["a_title"]) && isset($_POST["a_desc"])   &&isset($_POST["formSubmitNewArticleConfirm"]) &&
            $_POST["formSubmitNewArticleConfirm"] ==true      &&  $user->isEditor())
        {

            // check if name or title  already in use
            $allArticles = array();$true=true;
            $allArticles = $this->model->getAllArticles();
            foreach($allArticles as $article)
            {
                if($article->getName() ==$_POST["a_name"] )
                    $result .= "Name allready in user , Unable to add article";
                if($article->getTitle() ==$_POST["a_title"] )
                    $result .= "Name allready in user , Unable to add article";
                if($result!=null)  $true = false;


            }
        if ($true) {

        // complete update acction

            if(isset($_POST["all_pages"]) && $_POST["all_pages"]=="on")$_POST["all_pages"]=1;
            else $_POST["all_pages"] = 0;
            if($this->model->addArticle( $_POST['a_contentarea'] ,$_POST['a_name'] , $_POST['a_title'] , $_POST['a_desc'], $_POST['a_blurb'], $_POST['a_content'] ,$_POST['a_page'] ,$_POST['all_pages'] ,$user->getId() ))
            {//success
                $lastOperationResults="You have successfully added a new article<br>";
                $arrayOfArticles[0] = $this->model->getArticleByName($_POST['a_name'] );
            }
        }
        }else
        // cancel update action  not enough info or user authorization error
        {
    $lastOperationResults  =$result;

            include '../view/admin/articleviews/addArticleDisplay.php';
        }


    }


      //loads the remove articel foorm
      public function removeAction($ID)
      {
          $arrayOfArticles[] = $this->model->getArticle($ID);
        include '../view/admin/articleviews/deleteArticleView.php';
      }


    // processes the delte article form
    public function removeActionConfirm($ID)
    {
        $article = $this->model->getArticle($ID);
        $result = $this->model->removeArticle($article);
        if($result!=0 ){
            // success
            $lastOperationResults =" Article has been deleted ". $result ." rows affected";
            $this->displayAction();

        }else{
            // failed to delete
            $lastOperationResults = "We were Unable to remove that article at this time";
            $result= $this->model->getArticle($ID);
            if($result>0){
                ?>There seems to be a problem removing the article, please check dependencies<?php
            }else{
                ?>That Article no longer lives in the CMS databse<?php


            $this->displayAction();
            }


        }
    }



}

?>
