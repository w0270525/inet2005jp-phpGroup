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
                <li>Logged in as <br/> <?php  echo $control->currentUser->getUsername()?> </li>


            </ul>
            <div class="btn-group">


                <!-- Lougout button -->
                <form action="#"    method="post" name="logout" id="logout" style="display:inline;" >
                    <input type="submit" name="logout" id="logout" class="btn btn-primary pull-right"   value="logout" style="display:inline;right:0;" />
                </form>
                <!-- clears the current for 100% -->
                <form action="#"    method="post" name="" id="" style="display:inline;" >
                    <input type="submit" name="" id="" class="btn btn-success pull-right"   value="Reset" style="display:inline;right:0;" />
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
                            <li data-target="" id="" ><a href="#">PLACEHOLDER</a></li>
                            <li data-target="" id=""><a href="#" >PLACEHOLDER</a></li>
                            <li data-target="" id="" ><a href="#">PLACEHOLDER</a></li>
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
                            <li data-target="addNewPages"   id="addNewPag"><a href="#"  >Add New Page</a></li>
                            <li data-target="removePages" id="removePag" ><a href="#" >Remove Page</a></li>
                            <li data-target="viewContents"  id="viewContent" ><a href="#">View Content Areas</a></li>
                            <li data-target="addContentViews"   id="addNewPag"><a href="#"  >Add Content Area</a></li>
                            <li data-target="viewArticles"  id="viewArticle" ><a href="#">View Articles</a></li>
                            <li data-target="addArticles"  id="addArticles" ><a href="#">Add Articles</a></li>
                            <li data-target="viewStyles"  id="viewStyle" ><a href="#">View Styles</a></li>
                            <li data-target="addStyles"  id="addStyles" ><a href="#">Add Styles</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <script>
                        function closeEditor()
                        {
                            $('#viewPages').hide();
                            $('#addContentViews').hide();
                            $('#viewArticles').hide();
                            $('#viewContents').hide();
                            $('#addNewPages').hide();
                            $('#removePages').hide();
                            $('#viewStyles').hide();
                            $('#addArticles').hide();
                            $('#addStyles').hide();
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
                $tempController->userController()->displayAdvancedAction($_GET["update"]);

        }


        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $roles=postRolesToArray();
            $_POST["roles"]=$roles;
            //custom handling with GET variable
            if((isset($_GET["update"]) && (isset($_POST["updateId"]) && checkVar($_POST["updateId"]) && checkVar($_POST["userName"]) &&
                    checkVar($_POST["FirstName"]) && checkVar($_POST["LastName"]) && checkVar($_POST["Createdby"]))  && $_GET["update"]  == $_POST["updateId"]))
            {
                $tempController->userController()->commitUpdateAction($_POST["updateId"],$_POST["userName"], $_POST["FirstName"], $_POST["LastName"], $roles,$_POST["Createdby"],$control->currentUser->getId());
            }
            if(isset($_POST["userName"]) && (isset($_POST["bnasd3432er"]) &&  checkVar($_POST["userName"]) && checkVar($_POST["FirstName"]) && checkVar($_POST["LastName"])))
            {
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

        <div id="addNewUsers"  class="containerAdmin"><?php
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

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST["formSubmitNewPage"])&&  $_POST["formSubmitNewPage"]=="true"){
                $control->pageController()->confirmAddAction( $control->currentUser);
            }
            if(isset($_POST["formSubmitNewContentArea"])&&  $_POST["formSubmitNewContentArea"]=="true"){
                $control->contentController()->confirmAddAction( $control->currentUser);

            }



        }
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
        <div id="addNewPages"  class="containerAdmin"><?php
            $control->pageController()->addAction();
            ?></div>
        <div id="viewContents"  class="containerAdmin"><?php
            $control->contentController()->displayAction();
            ?></div>
        <div id="viewStyles"   class="containerAdmin"><?php
            $control->styleController()->displayAction();
            ?></div>
        <div id="addContentViews"   class="containerAdmin"><?php
            $control->contentController()->addAction();
            ?></div>
        <div id="addArticles"   class="containerAdmin"><?php
            $control->articleController()->addAction();
            ?></div>
        <div id="addStyles"   class="containerAdmin"><?php
            $control->styleController()->addAction();
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