<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
    .hidden {
        display:none;
    }
</style>

<?php
if(CMS_checkAdmin()||CMS_checkEditor()||CMS_checkAuthor()):

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
                    <input type="submit" name="logout" id="logout" class="btn btn-primary pull-right"   value="logout" style="display:inline;right:0;" />
                </form>
                <!-- clears the current for 100% -->
                <form action="index.php"    method="post" name="" id="resetButton" style="display:inline;" >
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
                            <li data-target="addNUser" id="addUsers"><a href="#"   >Add User</a></li>
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
                            <li data-target="viewArticles"  id="viewArticlAuthorBut" ><a href="#">View Articles</a></li>
                            <li data-target="viewContents"  id="viewContentAuthorBut" ><a href="#">View Content Areas</a></li>
                            <li data-target="viewPages"  id="viewPageAuthorBut" ><a href="#">View Pages</a></li>
                            <li data-target="viewStyles"  id="viewStyleAuthorBut" ><a href="#">View Styles</a></li>
                       <!--     <li data-target="addNewPages"   id="addNewPagAuthorBut"><a href="#"  >Add New Page</a></li>
                            <li data-target="addContentViews"   id="addNewPagAuthorBut"><a href="#"  >Add Content Area</a></li>
                            <li data-target="addArticlesViews"   id="addArticlePagAuthorBut"><a href="#"  >Add New Article</a></li>
                            <li data-target="addNewStyleViews"  id="addStylepagAuthorBut" ><a href="#">Add Styles</a></li>
                            <li data-target="removePages" id="removePag" ><a href="#" >Remove Page</a></li>   -->
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
                            <li data-target="viewArticles"  id="viewArticle" ><a href="#">View Articles</a></li>
                            <li data-target="viewContents"  id="viewContent" ><a href="#">View Content Areas</a></li>
                            <li data-target="viewPages"  id="viewPage" ><a href="#">View Pages</a></li>
                            <li data-target="viewStyles"  id="viewStyle" ><a href="#">View Styles</a></li>
                            <li data-target="addNewPages"   id="addNewPag"><a href="#"  >Add New Page</a></li>
                            <li data-target="addContentViews"   id="addNewPag"><a href="#"  >Add Content Area</a></li>
                            <li data-target="addArticlesViews"   id="addArticlePag"><a href="#"  >Add New Article</a></li>
                            <li data-target="addNewStyleViews"  id="addStylepag" ><a href="#">Add Styles</a></li>
                            <li data-target="removePages" id="removePag" ><a href="#" >Remove Page</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <script>
                        function closeEditor()
                        {
                            $('#addNewStyleViews').hide();
                            $('#addArticlesViews').hide();
                            $('#viewPages').hide();
                            $('#addContentViews').hide();
                            $('#viewArticles').hide();
                            $('#viewContents').hide();
                            $('#addNewPages').hide();
                            $('#removePages').hide();
                            $('#viewStyles').hide();
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

        <div id="addNUser"  class="containerAdmin"><?php
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


        // CALLS TO  PROCESS THE UPDAET FORMS
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            //process new page form
            if(isset($_POST["formSubmitNewPage"])&&  $_POST["formSubmitNewPage"]=="true"){
                $control->pageController()->confirmAddAction( $control->currentUser);
            }

            // process new content are form
            if(isset($_POST["formSubmitEditContentArea"])&&  $_POST["formSubmitEditContentArea"]=="true"){
                $control->contentController()->confirmUpdateAction( $_POST["c_name"],$_POST["c_alias"],$_POST["c_desc"],$_POST["c_order"]);

            }


            // process new content are form
            if(isset($_POST["formSubmitNewContentArea"])&&  $_POST["formSubmitNewContentArea"]=="true"){
                $control->contentController()->confirmAddAction( $control->currentUser);

            }

            // process new articel area form
            if(isset ($_POST["a_name"]) &&  isset($_POST["a_title"]) && isset($_POST["a_desc"])   &&isset($_POST["formSubmitNewArticleConfirm"]) &&
                $_POST["formSubmitNewArticleConfirm"] ==true ){
                $_POST=CMS_postFormHelperFunction($_POST);


                $control->articleController()->confirmAddAction($_POST['a_contentarea'], $_POST['a_name'], $_POST['a_title'] , $_POST['a_desc'] ,
                    $_POST['a_blurb'], $_POST['a_content'], $_POST['a_contentarea'], $_POST['all_page'], $_POST["a_inactive"]);

            }

            // process new style form
            if(isset($_POST["formSubmitNewStyle"])&&  $_POST["formSubmitNewStyle"]=="true"){
                $control->styleController()->confirmAddAction( $control->currentUser);

            }

              // process new style form
            if(isset($_POST["formUpdateStyle"])&&  $_POST["formUpdateStyle"]=="true"){
                $control->styleController()->updateActionConfirm($_POST["s_id"],$_POST["s_name"], $_POST['s_desc'] , $_POST['s_style']);


            }


            if(isset($_POST["formEditArticleConfirm"])&&  $_POST["formEditArticleConfirm"]=="true")
            {
               $_POST=  $_POST=CMS_postFormHelperFunction($_POST);
                $control->articleController()->updateActionConfirm($_POST['a_id'], $_POST['a_name'] , $_POST['a_title'], $_POST['a_desc'],$_POST['a_blurb'],$_POST['a_content'],$_POST['all_page'],$_POST['a_contentarea'],$_POST['a_page'],$_POST["a_inactive"]);
            }


                // process delete content area fornm
         //   if(isset($_POST["formDelteeConfirm"]) && ($_POST["formDelteeConfirm"] ="'true"))
           //     $control->contentController()->removeActionConfirm($_POST["id"]);

            if(isset($_POST["formDelteeConfirm"])){

                $control->articleController()->removeActionConfirm( $_POST["id"]);

            }


        }

        // GETS THE UPDATE ACTIONS
        if($_SERVER["REQUEST_METHOD"]=="GET"){

            // activate  style
            if(isset($_GET["activateStyle"])){
                if ($control->styleController()->getStyle($_GET["activateStyle"])->getId()!=null)
                $control->styleController()->activateAction($control->styleController->getStyle($_GET["activateStyle"]));
            }


                // load article form
            if(isset($_GET["articleupdate"])){
                $control->articleController()->updateAction( $control->currentUser);

            }
            // load  content areaq form
            if(isset($_GET["updateContentArea"])){
          //      $_GET["contentupdate"]
                $control->contentController()->updateAction( $control->currentUser);

            }

          // load update style
            if(isset($_GET["updatestyle"])){
                $control->styleController()->updateAction( $control->currentUser);

            }

        // loads style delete form
        if(isset($_GET["deleteStyle"])){
            $control->styleController()->removeAction( $_GET["deleteStyle"]);

        }

        // loads contnetn area delete form
        if(isset($_GET["deleteContentArea"])){
            $control->contentController()->removeAction( $_GET["deleteContentArea"]);

        }

        // loads article area delete form
        if(isset($_GET["articleremove"])){
            $control->articleController()->removeAction( $_GET["articleremove"]);

        }
    }





        ?>
        <!--CUSTOM EDITOR VIEWS -->
        <!--CUSTOM EDITOR VIEWS -->
        <!--CUSTOM EDITOR VIEWS -->



        <!--  ad new pages  form -->
        <div id="addNewPages"  class="containerAdmin"><?php
            $control->pageController()->addAction();
            ?></div>

        <!--  add new contentarea  form -->
        <div id="addContentViews"   class="containerAdmin"><?php
            $control->contentController()->addAction();

            ?></div>
        <!--  add article form -->
        <div id="addArticlesViews"   class="containerAdmin"><?php
            $control->articleController()->addAction();
            ?></div>

        <!-- load  add style form -->
        <div id="addStyleViews"  class="containerAdmin"><?php
            $control->styleController()->displayAction();
            ?></div>

        <!-- load styles form -->                                                                                                                                    <!-- load  add style form -->
    <div id="addNewStyleViews"  class="containerAdmin"><?php
        $control->styleController()->addAction();
        ?></div>




    <?php
    }


    if($control->currentUser->isAuthor())
    {
        // process ontent are form
        if(isset($_POST["formSubmitEditContentArea"])&&  $_POST["formSubmitEditContentArea"]=="true"){
            $control->contentController()->confirmUpdateAction( $_POST["c_name"],$_POST["c_alias"],$_POST["c_desc"],$_POST["c_order"]);



        }






            ?>



        <!--CUSTOM Author VIEWS -->
        <!--CUSTOM Author VIEWS -->
        <!--CUSTOM Author VIEWS -->


        <div id="viewArticles"  class="containerAdmin"><?php
            $control->articleController()->displayAction();
            ?></div>
        <!--  view  All ContentsAreas  -->
        <div id="viewContents"  class="containerAdmin"><?php
            $control->contentController()->displayAction();
            ?></div>

        <!--  view all Stylers -->
        <div id="viewStyles"   class="containerAdmin"><?php
            $control->styleController()->displayAction();
            ?></div>

        <!--  view all Articles -->
        <div id="viewArticles"  class="containerAdmin"><?php
            $control->articleController()->displayAction();
            ?>
       </div>





    <?php

    }// END OF AUTHOR CUSTOM VIEWS

     ////////////////////////////////
     // VIEWS FOR EVRYNEWONE
    ////////////////////////////////////
    ?>

    <!--  view all pages -->
        <div id="viewPages"  class="containerAdmin"><?php
            $control->pageController()->displayAction();?>
        </div>









<?php

} //  NOTHING ABOVE THIS BRACE WILL BE ACTIVE OR VISIBLE IF USER IS NOT LOGGED IN
endif;// if user.admin/edior
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