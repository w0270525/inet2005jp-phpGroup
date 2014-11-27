<?php
   if(isset($_SESSION["logged"])  &&($_SESSION["logged"]==true))
   {
       include("../view/admin/addArticleView.php");
       include("../view/admin/addUserView.php");
       include("../view/admin/addContentView.php");
       include("../view/admin/addPageView.php");
       include("../view/admin/addStyleView.php");
   }
