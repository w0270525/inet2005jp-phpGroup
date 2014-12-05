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



    public function updateActionConfirm($s_id, $s_name,$s_desc, $s_style)
    {
        $true=true;
        $allStyles =$this->model->getAllStyles();
        $styleToUpdate= $this->model->getStyle($s_id);

        // verify name doesnt exist

        if($this->model->getStyleByName($s_name)->getId()==$styleToUpdate->getId())
            if($otherStyle->getId()!=$styleToUpdate->getId()):
                $true=false;

                // show message and display form
                $lastOperationResults="<div class='warning'>That file name is already in use please a different name</div>";

                $arrayOfStyles[]=$this->model->getStyle(intval($s_id));
                include '../view/admin/styleviews/editStyleView.php';
            endif;


        // call to do update
        if($true):

            // prepare
            $lastOperationResults = "";
            $styleToUpdate->setName($s_name);
            $styleToUpdate->setDesc($s_desc);
            $styleToUpdate->setStyle($s_style);
            $styleToUpdate->setModifieBy(CMS_getUser()->getId());

            // update
            $lastOperationResults = $this->model->updateStyle($styleToUpdate);

            //reset
            CMS_postGetReset();
            $arrayOfStyles[] =$this->model->getStyle($styleToUpdate->getId());
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
