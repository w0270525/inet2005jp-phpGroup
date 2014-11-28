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

        // clears the current login
        // resets all session variables resets controller and forces page reset
        if($_SERVER["REQUEST_METHOD"]=="POST")
            if(isset($_POST["logout"]))
            {
                $sessionFile="../sessions/sess_".  $_SESSION["sessionId"] ;
                $_SESSION["control"] = serialize(new  MainController());
                $_SESSION["sessionid"] =  null;
                $_SESSION["logged"]=false;
                $_SESSION["grants"]=0;

                // FIND THE SESSION FILE ND DELETE IT FROM THE SYSTEM
                unlink($sessionFile);
                header("refresh: 0;");
        }


        //create local non serialize controller for use
        $control = unserialize( $_SESSION["control"]);

        //add the session user to the unserilzed controller
        if(isset($_SESSION["user"])) $control->currentUser=$_SESSION["user"];


        // SETS CURRENT PAGE  IF NOT SET
        if(!isset($_GET['page'] )||empty($_GET['page'] ))
        {
           $_GET['page'] =1;
        }

        // Author login process
        if($_SERVER["REQUEST_METHOD"]=="POST")
            if(isset($_POST["authorName"]))
        {
            if($control->confirmUser($_POST["authorName"],$_POST["password"]))
            // only allow autors to login through main page, rediectb others to the admin login page
            if($control->currentUser->getRoleId()!=3){
                $_SESSION["user"]=null;$_SESSION["logged"]=false;
                $_SESSION["controler"]= new MainController();
                header("Location: /admin");
            }

         }




        // show the pagelogin only if not logged in already
        if(!isset($_SESSION["logged"]) || !$_SESSION["logged"])
            include ("../view/admin/pageLoginMenuView.php");
        //HANDLES ADMIN LOGIN AND FUNCTIONALITY
        if($_SERVER["REQUEST_URI"]=="/admin")
        {
            // login
            if(!empty($_POST["username"]) && !empty($_POST["password"]))
            {
               global $control ;
                $_SESSION["logged"] =$control->confirmUser($_POST["username"],$_POST["password"]);

            }
            //show login page
            if (!isset($_SESSION["logged"] )||$_SESSION["logged"]==false)
            include ("../view/admin/login.php");
        }



        // DIRECT LINK TO VIEW PAGES
        //$control->userController()->displayAction();
        //$control->articleController()->displayAction();
        //$control->pageController()->displayAction();
        //$control->styleController()->displayAction();


        // VIEWS TO DISPLAY

        //user login view
        if(isset($_SESSION["logged"]) && ($_SESSION["logged"])) include("./adm/admin.php");
        include("../view/displayPage.php");

    ?>
    </div>
    </body>
</html>