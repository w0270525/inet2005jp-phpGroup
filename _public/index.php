<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- tinyMCE -->
  <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: "textarea#html-content",
      theme: "modern",
      plugins: "code"
    });
  </script>
	<!--Chart.js-->
	<script src="js/Chart.js/Chart.js"></script>
  <!-- Jquery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- BOOTSTRAP  --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/styles.css">





    <?php
    //init the user session

    include_once("adm/miniViews/functions.php");
    include "sessionHandler.php";
    include_once("../controller/MainController.php");
    // gran functions for from various layers for usability

    include_once("../model/data/functions.php");
    $debug=true;

    if(isset($_GET['chart'])) $tempController->chartController()->displayChart();

    // SETS CURRENT PAGE  IF NOT SET
    if(!isset($_GET['page'] )||empty($_GET['page'] ))
    {
        $_GET['page'] = 1;
    }

    if(isset($_POST['passwordReset']) && isset($_POST['passVerify'])) {

      $control = new MainController();
      $control->resetPassword($_POST['userId'], $_POST['pass']);
      header ("Location: /admin");

    }

    ?>

  </head>
  <body>
    <div class="bodyMain" id="bodyMain">
    <?php

       if($showLoginBar) include("../view/admin/pageLoginMenuView.php");

       $control->displayAdmin($control);
       $control->pageController()->displayPage($_GET['page']);
        //w the admin login bar

    ?>
    </div>
    </body>
</html>