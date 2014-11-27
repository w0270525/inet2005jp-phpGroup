<?php
   if(isset($_SESSION["logged"])  &&($_SESSION["logged"]==true))
   {
       ?>
       <div class="loginDiv" id="loginDiv">Logged in as :<?php  echo $control->currentUser->getUsername() ?> </div>
    <?php
       include("../view/admin/addArticleView.php");
       include("../view/admin/addUserView.php");
       include("../view/admin/addContentView.php");
       include("../view/admin/addPageView.php");
       include("../view/admin/addStyleView.php");
   }
