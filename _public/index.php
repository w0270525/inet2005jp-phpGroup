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
  <!-- Jquery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- BOOTSTRAP  --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="bodyMain" id="bodyMain">
        <?php
        //init the user session

        include_once("adm/miniViews/functions.php");
        include "sessionHandler.php";
        // gran functions for from various layers for usability

        include_once("../model/data/functions.php");
        $debug=true;





        // SETS CURRENT PAGE  IF NOT SET
        if(!isset($_GET['page'] )||empty($_GET['page'] ))
        {
           $_GET['page'] =1;
        }




        // Author login process
        // Allows oonly those wiht author privvleges to lofin to the login bar.
//        if($_SERVER["REQUEST_METHOD"]=="POST")
//            if(isset($_POST["authorName"])&& isset($_POST["passwordAuthor"]))
//            {
//                if($control->confirmUser($_POST["authorName"],$_POST["passwordAuthor"])){
//                    $_SESSION["logged"] = $control->confirmUser($_POST["authorName"],$_POST["passwordAuthor"]);
//               }
//            }
//            else if(isset($_POST["userName"])&& isset($_POST["password"]))
//            {
//
//                $_SESSION["logged"] = $control->confirmUser($_POST["userName"],$_POST["password"]);
//
//            }
//
//            else   if(isset($_POST["password"]) && isset($_POST["passwordReset"]))
//            {
//                $name = $tempController->userController()->model->getUserById( $_POST["userName"])->getUsername();
//                if(!$control->confirmUser($_POST["userName"],"password" )){
//                // un verified login
//                $_SESSION["user"]=null;$_SESSION["logged"]=false;
//                //$_SESSION["controller"]= new MainController();
//                $_SESSION["control"] = unserialize(new  MainController());
//
//                $_SESSION["logged"]=false;
//                }else
//                {
//                    $_SESSION["logged"]=true;
//
//                    $currentUser=CMS_getUser();
//                    $control->confirmUser($_POST["userName"],$_POST["password"]);
//                }
//
//            if (!isset($_SESSION["logged"] )||$_SESSION["logged"]==false)
//            {
//                $control->login();
//                header("Location: /admin");
//            }
//
//
//         }
//
//        if(isset($_POST["passwordReset"]) && isset($_POST["passVerify"])){
//            $control->resetPassword($_POST["userName"],$_POST["pass"]);
//            header("Location: /admin");
//            echo" tank you";
//
//
//
//        }
//
//




        $control->displayAdmin($control);





        //w the admin login bar
        if($showLoginBar) include("../view/admin/pageLoginMenuView.php");




        $control->pageController()->displayPage($_GET['page']);

    ?>
    </div>
    </body>
</html>