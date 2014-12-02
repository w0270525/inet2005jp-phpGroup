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
require_once('functions.php');
 if(verifyAdmin()){

    if(!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
    <?php
    endif;

    //function to insrt glps into table based on boolean value -->

    ?>
    <h1>Current Users:</h1>
    <table  class="table table-striped table-hover " data-toggle="table" id="table-style" data-row-style="rowStyle">
        <thead>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Creator</th>
            <th>Creation Date</th>
            <th>Admin</th>
            <th>Editor</th>
            <th>Author</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($arrayOfUsers as $user){

            ?>
            <tr>
                <td><?php echo $user->getUsername(); ?></td>
                <td><?php echo $user->getFirstName(); ?></td>
                <td><?php echo $user->getLastName(); ?></td>
                <td><?php echo $user->getCreatedby(); ?></td>
                <td><?php echo $user->getCreationDate() ; ?></td>
                <td><?php tableGlyphs($user->isAdmin()) ?></td>
                <td><?php tableGlyphs($user->isEditor()); ?></td>
                <td><?php tableGlyphs($user->isAuthor()); ?></td>
                <td><a href="?update=<?php echo $user->getId() ; ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>

            </tr>
        <?php
          }
    ?>

        </tbody>
        <tfoot></tfoot>
    </table>
<?php
 }// end if admin
?>
</body>
</html>