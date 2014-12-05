<?php

require_once('../model/ArticleModel.php');

require_once('../model/data/functions.php');
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


    // updateAction(Int id, String name , String title,  String desc , String blurb, String content, String allPages, String title, String contentArea, String page )
    // updates an articel in the database;

    public function updateActionConfirm($a_id, $a_name , $a_title,  $a_desc , $a_blurb,$a_content, $a_allPages,  $a_contentArea, $a_page )
    {   // verify artilce exissts
        if($currentArticle = $this->model->getArticle($a_id)):
            $articleToUpdate = new Article($a_id,$a_contentArea,$a_name,$a_title,$a_desc,$a_blurb,$a_content,$a_page,$a_allPages,null,null,CMS_getUser()->getId(),null);

            // get update result and show display
            if($result = $this->model->updateArticle($articleToUpdate)):

                    // On Succes reload update form
                    $lastOperationResults="Article has been updated ". $result ." effected";
                    $arrayOfArticles[0]=$this->model->getArticle($_GET["articleupdate"]);
                    include "../view/admin/articleviews/editArticleView.php";
            else:
                    // on fail display all articles
                    $lastOperationResults="We were unable to update that article, please try again";
                    $arrayOfArticles[0]=$this->model->getAllArticles();
                    include "../view/admin/articleviews/displayArticlesView.php";
            endif;
         endif;
    }





    public function confirmAddAction($user)
    {
        $result=null;
         // validate info befor adding a record
        if(isset ($_POST["a_name"]) &&  isset($_POST["a_title"]) && isset($_POST["a_desc"])   &&isset($_POST["formSubmitNewArticleConfirm"]) &&
            $_POST["formSubmitNewArticleConfirm"] ==true      &&  $user->isEditor())
        {
            // check if name or title  already in use
            $allArticles = array();$true=true;
            $allArticles = $this->model->getAllArticles();

            // create error messages for user
            foreach($allArticles as $article)
            {
                if($article->getName() ==$_POST["a_name"] )
                    $result .= "Name already in user , Unable to add article";
                if($article->getTitle() ==$_POST["a_title"] )
                    $result .= "Name already in user , Unable to add article";
                if($result!=null)  $true = false;
            }
        if ($true) {

            // complete update action
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
            $lastOperationResults ="<p class = 'result'> Article has been deleted ". $result ." rows affected</p>";
            $this->displayAction();
            $_POST=NULL;$_GET=NULL;

        }else{
            // failed to delete
            $lastOperationResults = "We were Unable to remove that article at this time";
            if(!$this->model->getArticle($ID)){ //$result=0;

                $lastOperationResults  = "<p class= 'error'> There seems to be a problem removing the article, please check dependencies</p>";
                $this->displayAction();

            }else{
                $lastOperationResults = "<p   class='error'> That Article no longer lives in the CMS databse </p>";
                $_POST=NULL;$_GET=NULL;
                $arrayOfArticles=$this->model->getAllArticles();
                include '../view/admin/articleviews/displayArticlesView.php';

            }


        }
    }



}

?>
