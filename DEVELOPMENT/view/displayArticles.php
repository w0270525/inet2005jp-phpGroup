<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Customers</title>
    <style type="text/css">
        table
        {
            border: 1px solid purple;
        }
        th, td
        {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<?php
if(!empty($lastOperationResults)):
    ?>
    <h2><?php echo $lastOperationResults; ?></h2>
<?php
endif;
?>
<h1>Current Articles:</h1>
<table>
    <thead>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Role Id</th>
        <th>pass</th>
        <th>salt </th>
        <th>Creator</th>
        <th>Creation Date</th>
        <th>modifier</th>
        <th>mod date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($arrayOfArticles as $article):

        ?>
        <tr>
            <td><?php echo $article->getID(); ?></td>
            <td><?php echo $article->getName(); ?></td>
            <td><?php echo $article->getTitle(); ?></td>
            <td><?php echo $article->getBlurb(); ?></td>
            <td><?php echo $article->getCreatedby(); ?></td>
             <td><?php echo $article->getCreationDate() ; ?></td>
             <td><?php echo $article->getModifiedBy(); ?></td>
            <td><?php echo $article->getModifiedDate(); ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
</body>
</html>
