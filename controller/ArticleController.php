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


    // updateAction(Int id, String name , String title,  String desc , String blurb, String content, Integer allPages, String title, Integer contentArea, Integer page , Integer acitive )
    // updates an articel in the database;

    public function updateActionConfirm($a_id, $a_name , $a_title,  $a_desc , $a_blurb,$a_content, $a_allPages,  $a_contentArea, $a_page, $a_active )
    {   // verify artilce exissts
        if($currentArticle = $this->model->getArticle($a_id)):
            $articleToUpdate = new Article($a_id,$a_contentArea,$a_name,$a_title,$a_desc,$a_blurb,$a_content,$a_page,$a_allPages,null,null,CMS_getUser()->getId(),null,$a_active);

            // get update result and show display
            if($result = $this->model->updateArticle($articleToUpdate)):

                    // On Succes reload update form
                    $lastOperationResults="Article has been updated ". $result ." effected";
                    $arrayOfArticles[0]=$this->model->getArticle($a_id);
                    $_GET["page"]=$articleToUpdate->getAssocPage();
//                    $lastOperationsResults = "You have updated the  article";
                //    include "../view/admin/articleviews/editArticleView.php";
            else:
                    // on fail display all articles
                    $lastOperationResults="We were unable to update that article, please try again";
                    $arrayOfArticles[0]=$this->model->getAllArticles();
                    include "../view/admin/articleviews/displayArticlesView.php";
            endif;
         endif;
    }





    public function confirmAddAction($contentArea, $name, $title, $desc, $blurb, $content,$page,$allPages,$inactive)
{
        $articleToAdd=new Article(null,$contentArea, $name, $title, $desc, $blurb, $content,$page,$allPages,CMS_getUser()->getId(),null,CMS_getUser()->getId(),null,$inactive);

        $result=null;

        // check if name or title  already in use
        $allArticles = array();
        $allArticles = $this->model->getAllArticles();


        $tempArticle= $this->model->getArticleByName($name);
        if ($tempArticle->getId()==null) {

           $result=$this->model->insertArticle($articleToAdd );
           if($result>0)
            {//success
                $lastOperationResults="You have successfully added a new article<br>";
                $arrayOfArticles[0] = $this->model->getArticleByName($_POST['a_name'] );
            }
        }
        else
        // cancel update action  not enough info or user authorization error
        {
            $arrayOfArticles[0] = $this->model->getArticleByName($_POST['a_name'] );
            include '../view/admin/articleviews/editArticleView.php';
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
