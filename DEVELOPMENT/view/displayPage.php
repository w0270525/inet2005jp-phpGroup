<!DOCTYPE html>
<html>

  <head>

    <?php

      $db = mysqli_connect("localhost", "root", "inet2005", "cms");
      if (!$db) {

        die('Could not connect to the Sakila Database: ' . mysqli_error($db));

      } else {

        $sql = "SELECT * FROM cms.PAGES ";
        $sql .= "INNER JOIN cms.STYLE ON PAGES.p_style = STYLE.s_id ";
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

      <?php echo $row['s_style']; ?>

    </style>
  </head>
  <body>

    <?php

      $sql = "SELECT * FROM cms.PAGES";
      $result = mysqli_query($db, $sql);

    ?>

    <ul>

    <?php

      while($row = mysqli_fetch_assoc($result)) {

    ?>

      <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $row['p_id']; ?>">
          <?php echo $row['p_name']; ?></a></li>

    <?php

      } // while END

    ?>

    </ul>

    <?php

      $sql = "SELECT * FROM cms.CONTENT_AREAS ";
      $sql .= "WHERE c_a_assocpage = ";
      $sql .= $_GET['page'] . " ";
      $sql .= "ORDER BY c_a_order;";

      $result = mysqli_query($db, $sql);

      while($row = mysqli_fetch_assoc($result)) {

    ?>

    <div class="<?php echo $row['c_a_alias']; ?>">

      <?php

        $sql = "SELECT * FROM cms.ARTICLE ";
        $sql .= "WHERE (a_assocpage = " . $_GET['page'] . " ";
        $sql .= "AND a_contentarea = " . $row['c_a_id'] . ") ";
        $sql .= "OR a_allpages = 1 ";
        $sql .= "ORDER BY a_creationdate;";
        $articleResults = mysqli_query($db, $sql);

        while($artRow = mysqli_fetch_assoc($articleResults)) {

      ?>

      <h3><?php echo $artRow['a_title']; ?></h3>
      <article><?php echo $artRow['a_content']; ?></article>

      <?php

        } // while END

      ?>

    </div>

    <?php

      } // while END


      mysqli_close($db);

    ?>

  </body>

</html>