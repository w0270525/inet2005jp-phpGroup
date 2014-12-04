<!DOCTYPE html>
<html>

  <head>

    <?php

      $db = mysqli_connect("localhost", "root", "inet2005", "cms");
      if (!$db) {

        die('Could not connect to the Sakila Database: ' . mysqli_error($db));

      } else {

        $sql = "SELECT * FROM cms.PAGES ";
        $sql .= "WHERE p_id = ";
        if(!empty($_GET['page']))
          $sql .= $_GET['page'] . ";";
        else
          $sql .= "1;";
        $result = mysqli_query($db, $sql);

      } // if else END

      if(!$result) {

        die ('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));

      } // if END

      $row = mysqli_fetch_assoc($result);

    ?>

    <title><?php echo $row['p_name']; ?></title>
    <style>
      <?php

        $sql = "SELECT s_style FROM cms.STYLE";
        $sql .= "WHERE s_active = 1;";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);

        echo $row['s_style'];

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