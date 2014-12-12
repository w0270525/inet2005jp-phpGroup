
    <title><?php echo $currentPage->getName(); ?></title>
    <style>
      <?php
     //   echo CMS_getMainStyle();
         echo $currentPage->getStyle()->getStyle();

      ?>
    </style>

 <?php

 if(!empty($lastOperationResults)):
     ?>
     <h2><?php echo $lastOperationResults; ?></h2>
 <?php
 endif;
 // varibles for author editing
 require_once "formClass/editArticleFormClass.php";
 //require_once "formClass/addArticleFormClass.php";
 $articleCounter=0;

  $arrayOfStyles = array();
 // if(isset($_SESSION["user"]) && CMS_checkEditor() && !CMS_hideAuthor()) include "frontPageEditStyle.php";
 ?>
    <ul>
    <?php

   // include "nav.php";



    ?>
    </ul>
    <?php
      foreach ($currentPage->getContentAreas() as $ca) {
    ?>
      <div class="<?php echo $ca->getAlias(); ?>" id="<?php echo $ca->getAlias(); ?>">
    <?php
        if (!$ca->getArticles())
    {
        if(isset($_SESSION["user"]) && CMS_checkAuthor() && CMS_hideAuthor()==false) include "frontPageAddArticle.php";

    }



        foreach ($ca->getArticles() as $a) :
            // author edit current article opption
            if(isset($_SESSION["user"]) && CMS_checkAuthor() && CMS_hideAuthor()==false) include "frontPageEditArticle.php";

                    // only show to article to author if it is inactive
            if(!$a->getActive() || (CMS_checkAuthor() && !CMS_hideAuthor())):

            ?>
                <h3 class=article-title" id="article-title-<?php echo $ca->getAlias();?>"><?php echo $a->getTitle(); ?></h3>
                <article class=article-body" id="article-body-<?php echo $ca->getAlias();?>""><?php echo $a->getContent(); ?></article>
            <?php
            endif; //end hide article

             endforeach; // foreach ($a) END
            ?>
      </div>
    <?php
      } // foreach ($ca) END
    ?>

</html>