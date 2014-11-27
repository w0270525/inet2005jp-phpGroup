


<?php
   if(isset($_SESSION["logged"])  &&($_SESSION["logged"]==true))
   {
       include_once("../model/class/User.php");
       $control->currentUser = unserialize($_SESSION["user"]);
       ?>
       <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
           <div class="container">
               <span class="loginDiv" id="loginDiv">Logged in as :<?php  echo $control->currentUser->getUsername() ?> </span>

           </div>
       </nav>
       <?php




       // this switch statem can be usede to assign ceratin views to certain roleIDS
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
