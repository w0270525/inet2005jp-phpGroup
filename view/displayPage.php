<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $currentPage->getName(); ?></title>
    <style>
      <?php
        echo $currentPage->getStyle()->getStyle();
         $arrayOfStyles = array();
      include "test.php";
      ?>
    </style>
  </head>

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