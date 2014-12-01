
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



    ?>
    <h1>ADD A NEW USER</h1>
    <table  class="table table-striped table-hover " data-toggle="table" id="table-style" data-row-style="rowStyle">
        <thead>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>

            <th>Admin</th>
            <th>Editor</th>
            <th>Author</th>
            <th>Edit</th>
        </tr>
        </thead><form onsubmit="return formSubmitted()" method="post" name="addNewUser" id="addNewUser" >
            <tbody>



            <tr><input class="hidden" type="hidden" name="bnasd3432er" id="bnasd3432er" value=<?php echo $bnasd3432er?>  >

                <td><input type="text" name="userName" id="userName"     required  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$"   /></td>
                <td><input type="text" name="FirstName" id="FirstName"    required pattern="^[a-zA-Z][a-zA-Z]{3,20}$"   /></td>
                <td><input type="text" name="LastName" id="LastName"   required pattern="^[a-zA-Z][a-zA-Z]{3,20}$"  /></td>
                <td><input type="radio" name="admin" id="admin"   />  </td>
                <td><input type="radio" name="editor" id="editor" />  </td>
                <td><input type="radio" name="author" id="author" />   </td>
                <td> <a class="button"  value="addUser" id="unhideSubmit"  onclick="$('#formSubmit').show();" >Add User</a></td>

            </tr>
            <tr id="formSubmit" class="formSubmit" >
                <td colspan="10">
                    <div style="text-align:center;">
                        Please Confirm A NEW USER <input type="submit" value="addUser" id="addUser" class="button pull-right"  onclick="$('#formSubmit').hide() "/>

                    </div>
                </td>
            </tr>





            </tbody></form>
        <tfoot></tfoot>
    </table>
    <script>
        $('#formSubmit').hide();


        function formSubmitted(){

        }




    </script>
<?php
}// end if admin
?>
</body>
</html>
