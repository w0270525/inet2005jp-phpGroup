<?php

require_once('../model/StyleModel.php');

class StyleController
{
    public $model;

    public function __construct()
    {
        $this->model = new StyleModel();

    }

    // displays  all the current styles
    public function displayAction()
    {
        $arrayOfStyles = $this->model->getAllStyles();

        include '../view/admin/styleviews/displayStylesView.php';
    }

    // void updateAction(); -->creates accessible Style Object in th DOM
    // send back update for with corresponding information regarding the id
    public function updateAction($id)
    {   // verification
        if (isset($_GET["updatestyle"])):

            // parse the varible to int and get the coresopnding style

            $arrayOfStyles[]=$this->model->getStyle(intval( $_GET["updatestyle"]));
            include '../view/admin/styleviews/editStyleView.php';
        endif;
    } // end update action


    // void addAction();
    // displays the form to add a new style
    public function addAction()
    {
        include '../view/admin/styleviews/addStyleView.php';
    }// end add Action



    // void confirmAddAction(User user); --> creates array of Style objects accessible to the DOM after success
    // process the information sent in from the form. Sets the user to the last modified, so user should
    // point to the current user
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
                    $arrayOfStyles[0] = $this->model->getStyleByName($_POST['s_name'] );
                }
            }
        }else
            // cancel update action  not enough info or user authorization error
        {
            $lastOperationResults  =$result;

            include '../view/admin/styleviews/addStyleView.php';
        }


    }// end



    public function updateActionConfirm($s_name,$s_desc, $s_style)
    {
        $true=true;
        $allStyles =$this->model->getAllStyles();
        foreach($allStyles as $style)
        {
            if ($style->getName()==$s_name) $true=false;
        }
        if($true):
            $lastOperationResults = "";
            $currentStyle = $this->model->getStyle($_GET["updatestyle"]);
            $currentStyle->setName($s_name);
            $currentStyle->setDesc($s_desc);
            $currentStyle->setStyle($s_style);

            $user= unserialize($_SESSION["user"]);
            $currentStyle->setModifieBy($user->getId());
            $lastOperationResults = $this->model->updateStyle($currentStyle);
            $_POST=null;
            $_GET=null;
            $arrayOfStyles[] =$this->model->getStyle($currentStyle->getId());
            if($lastOperationResults)$lastOperationResults= " You have updated  the style successfulyy";
            else $lastOperationResults = "Unable to update the record, please try again";
            include '../view/admin/styleviews/editStyleView.php';
        else: $lastOperationResults="That name is already in use, Please try another";
        endif;

    }



        // shows stlety deletion forme
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

}// end style controller

?>
