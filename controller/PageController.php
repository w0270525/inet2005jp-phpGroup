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
    // String name, String alias, String desc);
    // adds a page into the databsse
    public function confirmAddAction($p_name, $p_alias , $p_desc )
    {
        $currentPages = $this->model->getAllPages();
        $lastOperationResults=NULL;
        foreach($currentPages as $page)
        {
            if ($p_name==$page->getName())
            {
                $lastOperationResults.="Unable to complete request: Page name detected in CMS database<br>";
            }
            if ($p_alias==$page->getAlias())
            {
                $lastOperationResults.="Unable to complete request: Page alias detected in CMS database<br>";
            }
        }

        if( $lastOperationResults==NULL):
            if($lastOperationResults= $this->model->addPage(new Page(null,$p_name, $p_alias ,$p_desc,null,null,CMS_getUser()->getId(),null,CMS_getUser()->getId(),null.null)))
            {
                $lastOperationResults="A page has been added<br>";

            $arrayOfPages[0] = $this->model->getPageByName("p_name");
            $_GET["page"]=$arrayOfPages[0] ->getId();
            include '../view/admin/pageviews/editPageView.php';
            }
            else
            {
                $lastOperationResults="Unable to complete that operation at this time<br>";
                $arrayOfPages =$this->model->getAllPages();
                include '../view/admin/pageviews/displayPageView.php';
            }
         endif;
         }



    // loads the delete form
    public function removeAction($id)
    {
        if($this->model->getPage($id)->getId()!=null)
        {
            $arrayOfPagObjects[0]=$this->model->getPage($id);
          include '../view/admin/pageviews/deletePageView.php';
        }else {
            $arrayOfPagObjects=$this->model->getAllPages();
            $lastOperationResults="Unabel to fins that page to remove";
            include '../view/admin/pageviews/displayPageView.php';
        }


    }


    // removes the page from the smc
    public function removeConfirmAction($id)
    {
        if($this->model->getPage($id)->getId()!=null)
        {
            $this->model->removePage($id);
        }else {
            $arrayOfPages=$this->model->getAllPages();
            $lastOperationResults="Unabel to find that page to remove";
            include '../view/admin/pageviews/displayPageView.php';
        }
    }
/////////////////////////////////////////////////////
//////////////////////////////////////////////////////
    public function displayPage($id)
    {

        if($id==null )$id=1;
        // Nav Array;
        $navArray = $this->model->getAllPages();
        // Create the current page;
        $currentPage = $this->model->constructDisplayPage($id);
        // show the website
        include '../view/displayPage.php';

    } // displayPage END

}

?>
