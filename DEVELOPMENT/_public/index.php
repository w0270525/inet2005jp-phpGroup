<html>
<head>
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
        include("sessionHandler.php");



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
            // only allow authors to login through main page, rediectb others to the admin login page
            if(!($control->currentUser->isAuthor())){
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