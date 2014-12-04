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
<h1>Current Pages:</h1>
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
    foreach($arrayOfPages as $page):

        ?>
        <tr>
            <td><?php echo $page->getId(); ?></td>
            <td><?php echo $page->getName(); ?></td>
            <td><?php echo $page->getDesc(); ?></td>
            <td><?php echo $page->getStyle(); ?></td>
            <td><?php echo $page->getCreatedby(); ?></td>
            <td><?php echo $page->getCreationDate() ; ?></td>
            <td><?php echo $page->getModifiedBy(); ?></td>
            <td><?php echo $page->getModifiedDate(); ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
</body>
</html>
