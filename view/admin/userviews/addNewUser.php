
<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#aduSerbutt_">Add A New User</button>
<div id="aduSerbutt_" class="collapse in">


 
  <!--   <script src="functions.js"></script>1-->

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



             <form onsubmit="return verifyformusername()" method="post" name="addNewUser" id="addNewUser" >




             <input class="hidden" type="hidden" name="bnasd3432er" id="bnasd3432er" value=<?php echo $bnasd3432er?>  >

                <label>UserName</label><input type="text" name="userName" id="userName"       pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$"   />
                <label>First Name</label><input type="text" name="FirstName" id="FirstName"     pattern="^[a-zA-Z][a-zA-Z]{3,20}$"   />
                <label>Last Name</label><input type="text" name="LastName" id="LastName"    pattern="^[a-zA-Z][a-zA-Z]{3,20}$"  />
                <label>Admin</label><input type="checkbox" name="admin" id="admin"   />
                <label>Editor</label><input type="checkbox" name="editor" id="editor" />
                <label>Author</label><input type="checkbox" name="author" id="author" />
                <label>Inactive</label> <input type="checkbox" name="inactive" id="inactive" />



                <div><a class="btn btn-default form-control"  type="button" value="Verify" id="unhideSubmit"  onclick="verifyformusername()" >Add User</a>
                 </div>
                 <input type="submit"   value="addUser" id="addUserSubmnitButton" class="btn btn-default form-control"  onclick="verifyformusername();resetBut();"/>
</form>

 </div>
    <script>
        
        

        function  verifyformusername()
        {
            if (document.forms['addNewUser']['userName'].value.length>5)

                if   (document.forms['addNewUser']['FirstName'].value.length>5)
                    if (document.forms['addNewUser']['LastName'].value.length>5)


                {
                    $('#unhideSubmit').hide();
                    $('#addUserSubmnitButton').show();
                    return true;
                }
        return false;
        }


        $('#addUserSubmnitButton').hide();

        function resetButto()
        {
            $('#unhideSubmit').show();
            $('#addUserSubmnitButton').hide();
        }




    </script>
<?php
}// end if admin
?>
 
