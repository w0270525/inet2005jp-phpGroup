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
        .glyphicon
        {

            display:block;
            text-align:center

        }
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
require_once('functions.php');
//function to insrt glps into table based on boolean value -->

?>
<h1>Edit  Users:</h1>
<table  class="table table-striped table-hover " data-toggle="table" id="table-style" data-row-style="rowStyle">
    <thead>
    <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Creator</th>
        <th>Creation Date</th>
        <th>Modified Date</th>
        <th>Admin</th>
        <th>Editor</th>
        <th>Author</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
   // foreach($arrayOfUsers as $user){

        ?>
        <tr>
            <td><?php echo $fetchedUser->getUsername(); ?></td>
            <td><?php echo $fetchedUser->getFirstName(); ?></td>
            <td><?php echo $fetchedUser->getLastName(); ?></td>
            <td><?php echo $fetchedUser->getCreatedby(); ?></td>
            <td><?php echo $fetchedUser->getCreationDate() ; ?></td>
            <td><?php echo $fetchedUser->getModifiedDate() ; ?></td>
            <td><?php tableGlyphs($fetchedUser->isAdmin()) ?></td>
            <td><?php tableGlyphs($fetchedUser->isEditor()); ?></td>
            <td><?php tableGlyphs($fetchedUser->isAuthor()); ?></td>
            <td class="glyphicon glyphicon-save"> </td>

        </tr>
    <form>

        <tr>
            <td><input type="text" name="userName" id="userName" value=<?php echo $fetchedUser->getUsername(); ?> required></td>
            <td><input type="text" name="FirstName" id="FirstName" value=<?php echo $fetchedUser->getFirstName(); ?> required></td>
            <td><input type="text" name="LastName" id="LastName" value=<?php echo $fetchedUser->getLastName(); ?> required></td>
            <td><input type="text" name="Createdby" id="Createdby" value=<?php echo $fetchedUser->getCreatedby(); ?> required></td>
            <td><?php echo $fetchedUser->getCreationDate() ; ?>  </td>
            <td><?php echo $fetchedUser->getModifiedDate() ; ?>  </td>
            <td><input type="radio" name="admin" id="admin" value=<?php echo $fetchedUser->isAdmin(); ?> required></td>
            <td><input type="radio" name="editor" id="editor" value=<?php echo $fetchedUser->isEditor(); ?> required></td>
            <td><input type="radio" name="author" id="author" value=<?php echo $fetchedUser->isAuthor(); ?> required></td>
            <td ><input type="submit" value="UPDATE" id="UPDATE" >  </td>

        </tr>
    </form>
    <?php

    ?>

    </tbody>fetched
    <tfoot></tfoot>
</table>
</body>
</html>