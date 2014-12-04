<!DOCTYPE html>
<html>

  <head>

    <?php

      $db = mysqli_connect("localhost", "root", "inet2005", "cms");
      if (!$db) {

        die('Could not connect to the Sakila Database: ' . mysqli_error($db));

      }

    ?>

    <title><?php echo $currentPage->getName(); ?></title>
    <style>
      <?php

        echo $currentPage->getStyle()->getStyle();

      ?>
    </style>
  </head>
  <body>
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

      $sql = "SELECT CONTENT_AREAS.c_a_id, ";
      $sql .= "CONTENT_AREAS.c_a_alias, ARTICLE.* ";
      $sql .= "FROM cms.CONTENT_AREAS ";
      $sql .= "INNER JOIN ARTICLE ON CONTENT_AREAS.c_a_id = ARTICLE.a_contentarea ";
      $sql .= "WHERE a_assocpage = ";
      $sql .= $_GET['page'] . " ";
      $sql .= "OR a_allpages = 1 ";
      $sql .= "ORDER BY c_a_order;";

      $result = mysqli_query($db, $sql);

      while($row = mysqli_fetch_assoc($result)) {

    ?>

    <div class="<?php echo $row['c_a_alias']; ?>">
      <h3><?php echo $row['a_title']; ?></h3>
      <article><?php echo $row['a_content']; ?></article>
    </div>

    <?php

      } // while END


      mysqli_close($db);

    ?>

  </body>

</html>