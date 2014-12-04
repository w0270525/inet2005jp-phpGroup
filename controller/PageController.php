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
        $page =$this->model->getPage($id);


        include '../view/admin/pageviews/editPageView.php';
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
            include '../view/admin/pageviews/editPageView.php';
        }
        }

            else {

                $arrayOfPages =$this->model->getAllPages();
                include '../view/admin/pageviews/displayPageView.php';

            }
    }

    public function displayPage($id) {

      // Nav Array;
      $navArray = $this->model->getAllPages();

      // Get the active style and make a style object out of it.
        // (So call the style controller?)

      // Get an array of all articles which belong to this page or appear on all pages.

      // Create an array of all the Content Areas;

      // Loop through content areas and add articles associated with that area to
      // that areas article array using the array_push function.

      // Create the current page, call it,
      // $currentPage


      // show the website
      include '../view/displayPage.php';

    } // displayPage END
}

?>
