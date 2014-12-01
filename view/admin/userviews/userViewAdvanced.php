<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>

    <title>Edit User</title>
    <script src="functions.js"></script>

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
if(verifyAdmin())
{

    if(!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
    <?php
    endif;

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

            <th>Admin</th>
            <th>Editor</th>
            <th>Author</th>
            <th>Edit</th>
        </tr>
        </thead><form onsubmit="return checkform()" method="post" name="updateUser" id=updateUser">
        <tbody>
        <?php
       // foreach($arrayOfUsers as $user){

            ?>

            <tr>
                <td><?php echo $fetchedUser->getUsername(); ?></td>
                <td><?php echo $fetchedUser->getFirstName(); ?></td>
                <td><?php echo $fetchedUser->getLastName(); ?></td>
                <td><?php echo $fetchedUser->getCreatedby(); ?></td>

                <td><?php tableGlyphs($fetchedUser->isAdmin()) ?></td>
                <td><?php tableGlyphs($fetchedUser->isEditor()); ?></td>
                <td><?php tableGlyphs($fetchedUser->isAuthor()); ?></td>
                <td class="glyphicon glyphicon-save"> </td>

            </tr>
        <!-- a form in a table that mirror above structre -->
        <tr  class="danger" style="color:red";><td  >Creation Date</td>
            <td  ><?php echo $fetchedUser->getCreationDate() ; ?>  </td>
            <td  >Modified Date</td>
            <td><?php echo $fetchedUser->getModifiedDate() ; ?>  </td>
        </tr>

            <tr><input class="hidden" type="hidden" name="updateId" id="updateId" value=<?php echo $fetchedUser->getId(); ?> required/>

                <td><input type="text" name="userName" id="userName" value=<?php echo $fetchedUser->getUsername(); ?> required/></td>
                <td><input type="text" name="FirstName" id="FirstName" value=<?php echo $fetchedUser->getFirstName(); ?> required/></td>
                <td><input type="text" name="LastName" id="LastName" value=<?php echo $fetchedUser->getLastName(); ?> required/></td>
                <td><input type="text" name="Createdby" id="Createdby" value=<?php echo $fetchedUser->getCreatedby(); ?> required/></td>

                <td><input type="radio" name="admin" id="admin" value=<?php echo $fetchedUser->isAdmin(); ?>/>  </td>
                <td><input type="radio" name="editor" id="editor" value=<?php echo $fetchedUser->isEditor(); ?>/>  </td>
                <td><input type="radio" name="author" id="author" value=<?php echo $fetchedUser->isAuthor(); ?>/>   </td>
                <td> <a class="button"  value="Update" onclick="$('#formSubmit').show()" >UPDATE</a></td>

            </tr>
             <tr id="formSubmit" class="formSubmit" >
              <td colspan="10">
                  <div style="text-align:center;">
                     Please Confirm User Update Action <input type="submit" value="UPDATE" id="UPDATE" class="button pull-right"  />

                  </div>
              </td>
             </tr>





        </tbody></form>
        <tfoot></tfoot>
    </table>
    <script>
        $('#formSubmit').hide();
    </script>
<?php
}// end if admin
?>
</body>
</html>
