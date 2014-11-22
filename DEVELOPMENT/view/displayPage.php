<!DOCTYPE html>
<html>

  <head>

    <?php

      $db = mysqli_connect("localhost", "root", "inet2005", "cms");
      if (!$db) {

        die('Could not connect to the Sakila Database: ' . mysqli_error($db));

      } else {

        $sql = "SELECT * FROM cms.PAGES";
        $sql .= "INNER JOIN cms.STYLE ON PAGES.p_style = STYLE.s_id";
        $sql .= "INNER JOIN cms.CONTENT_AREAS ON PAGES.p_id = CONTENT_AREAS.c_a_assocpage";
        $sql .= "INNER JOIN cms.ARTICLE ON CONTENT_AREAS.c_a_id = ARTICLE.a_contentarea";
        $sql .= "WHERE p_id = ";
        $sql .= $_GET['page'] . ";";

        $result = mysqli_query($db, $sql);

      } // if else END

      if(!$result) {

        die ('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));

      } // if END

    ?>

    <title><?php // echo p_name here ?></title>
    <style>

      <?php // echo s_style here ?>

    </style>
  </head>
  <body>

    <?php

      // loop through content areas and echo their associated articles.

    ?>

  </body>

</html>