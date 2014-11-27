


<?php
    // confirm loggin
   if(isset($_SESSION["logged"])  &&($_SESSION["logged"]==true))
   {
       include_once("../model/class/User.php");

       //grab instance of current user
       $control->currentUser = unserialize($_SESSION["user"]);
       ?>

       <!--BOOT STRAP ENABLED NAV BAR -->
       <nav class="navbar navbar-default navbar-fixed-top" role="navigation" class="cmsCmsAdminBar" id="cmsCmsAdminBar" >
           <div class="container-fluid">
                <ul class="nav navbar-nav">

                    <!--show current user -->
                   <li> <a>username</a></li>
                   <li class="active"> <a> <?php  echo $control->currentUser->getUsername()?></a></li>

                    <!-- show logout button -->
                   <li><a><form action="#" method="post" name="logout" id="logout" ><input type="submit" name="logout" id="logout" class="logout" value="logout" ></form></a></li>

                </ul>
           </div>
       </nav>
      <?php

       // this switch statement can be usede to assign ceratin views to certain roleIDS
       switch ( $control->currentUser->getRoleId())
       {
           case 1:
               ?>EDIT/ADD NEW USER<?php
               include("../view/admin/addUserView.php");
               break;
           case 2:
               ?>EDIT/ADD NEW CONTENT<?php
               include("../view/admin/addContentView.php");
               include("../view/admin/addPageView.php");
               include("../view/admin/addStyleView.php");
               break;
           case 3:
               ?>EDIT/ADD NEW ARTICEL<?php
               include("../view/admin/addArticleView.php");


       }



   }
