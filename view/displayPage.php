<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $currentPage->getName(); ?></title>
    <style>
      <?php
         echo $currentPage->getStyle()->getStyle();
      ?>
    </style>
  </head>
 <?php


 // varibles for author editing
 require_once "formClass/editArticleFormClass.php";
 $articleCounter=0;

  $arrayOfStyles = array();
  if(CMS_checkAuthor() && CMS_hideAuthor()==false) include "frontPageEditStyle.php";
 ?>
    <ul>
    <?php
      foreach ($navArray as $page) {
    ?>
      <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page->getId(); ?>">
          <?php echo $page->getName(); ?></a></li>

    <?php
      } // foreach END
    ?>
    </ul>
    <?php
      foreach ($currentPage->getContentAreas() as $ca) {


    ?>
      <div class="<?php echo $ca->getAlias(); ?>">
    <?php
        foreach ($ca->getArticles() as $a) {


            // author edit current article opption

            if(CMS_checkAuthor() && CMS_hideAuthor()==false) include "frontPageEditArticle.php";

    ?>
        <h3><?php echo $a->getTitle(); ?></h3>
        <article><?php echo $a->getContent(); ?></article>
    <?php
        } // foreach ($a) END
    ?>
      </div>
    <?php
      } // foreach ($ca) END
    ?>

</html>