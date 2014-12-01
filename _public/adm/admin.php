<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
    .hidden {
        display:none;
    }
</style>

<?php
// confirm loggin
if(isset($_SESSION["logged"])  &&($_SESSION["logged"]==true))
{
    include_once("../model/class/User.php");
    include_once("miniViews/functions.php");

    //grab instance of current user
    $control->currentUser = unserialize($_SESSION["user"]);
    ?>

    <!--BOOT STRAP ENABLED NAV BAR -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" class="cmsCmsAdminBar" id="cmsCmsAdminBar" >
        <div class="container-fluid">
            <ul class="nav navbar-nav">

                <!--show current user -->
                <li>Logged in as  <br/> <?php  echo $control->currentUser->getUsername()?> </li>


            </ul>
            <div class="btn-group">


                <!-- Lougout button -->
                <form action="#"    method="post" name="logout" id="logout" style="display:inline;" >
                    <input type="submit" name="logout" id="logout" class="btn btn-warning pull-right"   value="logout" style="display:inline;right:0;" />
                </form>
                <?php
                // ADMIN CUSTOM MENU
                // ADMIN CUSTOM MENU
                // ADMIN CUSTOM MENU

                if($control->currentUser->isAdmin())
                {   ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" onclick='closeAdmin()' >Close Admin Windows</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li data-target="viewUsers" id="viewUserNav" ><a href="#">View Users</a></li>
                            <li data-target="addNewUser" id="addUsers"><a href="#"   >Add User</a></li>
                            <li data-target="removeUser" id="removeUsers" ><a href="#" >Remove User</a></li>

                        </ul>
                    </div><!-- /btn-group -->
                    <script>

                        function closeAdmin()
                        {
                            $('#viewUsers').hide();
                            $('#addNewUser').hide();
                            $('#removeUser').hide();

                        }
                    </script>
                    <?php

                    // ADMIN CUSTOM GET AND POST VARIABLES
                    // ADMIN CUSTOM GET AND POST VARIABLES
                    // ADMIN CUSTOM GET AND POST VARIABLES

                    if($_SERVER["REQUEST_METHOD"]=="get")
                    {
                        //custom handling with get variable
                    }
                    if($_SERVER["REQUEST_METHOD"]=="post")
                    {
                        //custom handling with post variable
                    }


                }


                // AUTHOR CUSTOM MENU
                // AUTHOR CUSTOM MENU
                // AUTHOR CUSTOM MENU
                if($control->currentUser->isAuthor())
                {
                    ?>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default" onclick="closeAuthor()" >Close Author Windows</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li data-target="" id="" ><a href="#">View Users</a></li>
                            <li data-target="" id=""><a href="#" >Add User</a></li>
                            <li data-target="" id="" ><a href="#" >Remove User</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <script>
                        function closeAuthor()
                        {

                        }
                    </script>

                    <?php

                    // AUTHOR CUSTOM  GET AND POST VARIABLES
                    // AUTHOR CUSTOM  GET AND POST VARIABLES
                    // AUTHOR CUSTOM  GET AND POST VARIABLES

                    if($_SERVER["REQUEST_METHOD"]=="get")
                    {
                        //custom handleing with get variable
                    }
                    if($_SERVER["REQUEST_METHOD"]=="post")
                    {
                        //custom handling with post variable
                    }

                }


                // EDITOR CUSTOM MENU ITEMS
                // EDITOR CUSTOM MENU ITEMS
                // EDITOR CUSTOM MENU ITEMS
                if($control->currentUser->isEditor())
                {
                    ?>


                    <div class="btn-group" id="btnGroup Editor">
                        <button type="button" class="btn btn-default" onclick="closeEditor()" >Close Editor Windows</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li data-target="viewPages"  id="viewPage" ><a href="#">View Pages</a></li>
                            <li data-target="viewArticles"  id="viewArticle" ><a href="#">View Articles</a></li>
                            <li data-target="addNewPage"   id="addNewPag"><a href="#"  >Add New Page</a></li>
                            <li data-target="removePage" id="removePage" ><a href="#" >Remove Page</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <script>
                        function closeEditor()
                        {
                            $('#viewPages').hide();
                            $('#viewArticles').hide();
                            $('#addNewPage').hide();
                            $('#removePage').hide();


                        }
                    </script>
                    <?php

                    // EDITOR CUSTOM GET AND POST VARIABLES
                    // EDITOR CUSTOM GET AND POST VARIABLES
                    // EDITOR CUSTOM GET AND POST VARIABLES

                    if($_SERVER["REQUEST_METHOD"]=="get")
                    {
                        //custom handling with get variable
                    }
                    if($_SERVER["REQUEST_METHOD"]=="post")
                    {
                        //custom handling with post variable
                    }
                }

                ?>
            </div>
        </div>

    </nav>




    <!-- CUSTOM VIEWS TO BE DISPLAYED FOR BACK END-->
    <!-- These views can only be accessed by the appropriate user when the user is properly logged in-->



    <div class="adminDisplay" id="adminDisplay">
        <!-- force the page down so they are not hidden by menu -->
        <br><br/><br/><br/>


        <?php

        // ADMIN CUSTOM GET AND POST VARIABLES
        // ADMIN CUSTOM GET AND POST VARIABLES
        // ADMIN CUSTOM GET AND POST VARIABLES

        if($_SERVER["REQUEST_METHOD"]=="GET")
        {
            //custom handling with GET variable
            if(isset($_GET["update"]) && !empty($_GET["update"]) &&   $_GET["update"]!=NULL )
            {
                $tempController->userController()->displayAdvancedAction($_GET["update"]);
            }
        }
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            //custom handling with GET variable
            if((isset($_GET["update"]) && (isset($_POST["updateId"]) && checkVar($_POST["updateId"]) && checkVar($_POST["userName"]) &&
                    checkVar($_POST["FirstName"]) && checkVar($_POST["LastName"]) && checkVar($_POST["Createdby"]))
                && $_GET["update"]  == $_POST["updateId"]))
            {
                $roles =array();
                if(isset($_POST["admin"]))
                    $roles[]=1;
                if(isset($_POST["editor"]))
                    $roles[]=2;
                if(isset($_POST["author"]))
                    $roles[]=3;
                $tempController->userController()->commitUpdateAction($_POST["updateId"],$_POST["userName"],
                    $_POST["FirstName"], $_POST["LastName"], $roles,$_POST["Createdby"],$control->currentUser->getId());
            }
            if(isset($_POST["userName"]) && (isset($_POST["bnasd3432er"]) &&  checkVar($_POST["userName"]) &&
                    checkVar($_POST["FirstName"]) && checkVar($_POST["LastName"])))
            {
                $roles =array();
                if(isset($_POST["admin"]))
                    $roles[]=1;
                if(isset($_POST["editor"]))
                    $roles[]=2;
                if(isset($_POST["author"]))
                    $roles[]=3;
                $_POST["roles"]=$roles;

                $tempController->userController()->confirmNewUser($control->currentUser);

            }
        }
        ?>
        <!--CUSTOM ADMIN VIEWS -->
        <!--CUSTOM ADMIN VIEWS -->
        <!--CUSTOM ADMIN VIEWS -->


        <div id="viewUsers"  class="containerAdmin"><?php
            $tempController->userController()->displayAction();
            ?></div>

        <div id="addNewUser"  class="containerAdmin"><?php
            $tempController->userController()->addNewUser();
            ?></div>
        <?php //  <div id="deleteUser"  class="containerAdmin"><?php include("../view/admin/userviews/addUserView.php");?> </div>
    <?php

    //////////////////////// EDITOR VIEWS ///////////////////////////////////
    /////////////////////////////////////////////////////////////////////////
    if($control->currentUser->isEditor())
    {
        // CUSTOM EDITOR GET AN POST
        // CUSTOM EDITOR GET AN POST
        // CUSTOM EDITOR GET AN POST


        if($_SERVER["REQUEST_METHOD"]=="GET")
        {
            if(isset($_GET["pageupdate"])){
                $control->pageController()->updateAction($_GET["pageupdate"]);
            }
        }



        ?>
        <!--CUSTOM EDITOR VIEWS -->
        <!--CUSTOM EDITOR VIEWS -->
        <!--CUSTOM EDITOR VIEWS -->

        <div id="viewPages"  class="containerAdmin"><?php
            $control->pageController()->displayAction();
            ?></div>
        <div id="addNewPage"  class="containerAdmin"><?php
            $control->pageController()->addAction();
            ?></div>


    <?php
    }


    if($control->currentUser->isAuthor())
    {      ?>



        <!--CUSTOM Author VIEWS -->
        <!--CUSTOM Author VIEWS -->
        <!--CUSTOM Author VIEWS -->


        <div id="viewArticles"  class="containerAdmin"><?php
            $control->articleController()->displayAction();
            ?></div>



        </div>

    <?php

    }// END OF AUTHOR CUSTOM VIEWS
    ?>


<?php
} //  NOTHING ABOVE THIS BRACE WILL BE ACTIVE OR VISIBLE IF USER IS NOT LOGGED IN
?>



<script>

    //menu handling script to show and hide areas as the menu options are clicked


    $('.containerAdmin').hide();
    $('.btn-group li').click(function(){
        var target = "#" + $(this).data("target");
        $(".containerAdmin").not(target).hide();
        $(target).show();
    });



</script>
</html>