<html>
<head>
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
        //
        if(session_status()==PHP_SESSION_NONE) {
            session_save_path("../sessions");
            session_start();
        }
        require ("../controller/MainController.php");

        // init the controller for the session
        // must be serialized in session varible
        $sessionID = session_id();
        if (!isset($_SESSION["sessionId"]) ||!isset($_SESSION["control"])){
           $_SESSION["sessionId"] =session_id();
           $_SESSION["control"] = serialize(new  MainController());
        }

        //creat local non serialize controller for use
        $control = unserialize( $_SESSION["control"]);

        //add the session user to the unserilzed controller
        if(isset($_SESSION["user"])) $control->currentUser=$_SESSION["user"];



        if(!isset($_GET['page'] )||empty($_GET['page'] ))
        {
           $_GET['page'] =1;
        }
        if($_SERVER["REQUEST_URI"]=="/admin")
        {
            if(!empty($_POST["username"]) && !empty($_POST["password"]))
            {
               global $control ;
                $_SESSION["logged"] =$control->confirmUser($_POST["username"],$_POST["password"]);
          //      $_SESSION["control"]=serialize($control);
            }
            if (!isset($_SESSION["logged"] )||$_SESSION["logged"]==false)
            include ("../view/admin/login.php");
        }
        //$control->userController()->displayAction();

        //$control->articleController()->displayAction();

        //$control->pageController()->displayAction();

        //$control->styleController()->displayAction();
        include("./adm/admin.php");
        include("../view/displayPage.php");

    ?>
    </div>
    </body>
</html>