<?php

require_once('../model/StyleModel.php');

class StyleController
{
    public $model;

    public function __construct()
    {
        $this->model = new StyleModel();

    }

    public function displayAction()
    {
        $arrayOfStyles = $this->model->getAllStyles();

        include '../view/admin/styleviews/displayStylesView.php';
    }

    public function updateAction($id)
    {
        $style =$this->model->getPage($id);


        include '../view/admin/styleviews/editStyleView.php';
    }

    public function addAction()
    {


        include '../view/admin/styleviews/addStyleView.php';
    }


    public function confirmAddAction($user)
    {

        $result=null;
        // validate info befor adding a record
        if(isset ($_POST["s_name"]) &&    isset($_POST["s_style"]) && isset($_POST["s_desc"])   &&isset($_POST["formSubmitNewStyle"]) &&
            $_POST["formSubmitNewStyle"] =="true"      &&  $user->isEditor())
        {

            // check if name or title  already in use
            $allStyles = array();$true=true;
            $allStyles = $this->model->getAllStyles();
            foreach($allStyles as $style)
            {
                if($style->getName() ==$_POST["s_name"] )
                    $result .= "Name already in user , Unable to add article";

                if($result!=null)  $true = false;


            }
            if ($true) {

                // complete update action


                if($this->model->addStyle( $_POST['s_name'] ,  $_POST['s_desc'],  $_POST['s_style'] ,$user->getId() ))
                {//success
                    $lastOperationResults="You have successfully added a new Style<br>";
                    $arrayOfArticles[0] = $this->model->getStyleByName($_POST['s_name'] );
                }
            }
        }else
            // cancel update action  not enough info or user authorization error
        {
            $lastOperationResults  =$result;

            include '../view/admin/styleviews/addStyleView.php';
        }


    }



}

?>
