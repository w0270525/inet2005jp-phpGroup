
<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#aduSbxvbxerbutt_">Delete a User</button>
<div id="aduSbxvbxerbutt_" class="collapse in">




    <?php

    require_once('functions.php');
    if(verifyAdmin())
    {

    if(!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
    <?php
    endif;
$user=$arrayOfUserObjects[0];


    ?>



    <form onsubmit="verifyformusername()" method="post" name="addNewUser" id="addNewUser" >




        <input class="hidden" type="hidden"  name="deleteuserid" value="<?php echo $user->getUsername()?>" id="deleteuserid"   >

        <label>UserName</label><input type="text" name="userName" id="userName"  readonly="readonly"   value=<?php echo $user->getUsername()?>     />
        <label>First Name</label><input type="text" name="FirstName" id="FirstName"  readonly="readonly"    value=<?php echo $user->getFirstName()?>      />
        <label>Last Name</label><input type="text" name="LastName" id="LastName"  readonly="readonly"   value=<?php echo $user->getLastName()?>    />




        <div><a class="btn btn-warning form-control"  type="button"  id="unhideSubmit"  onclick="deluserbtn()" >Remoe User</a>
        </div>
        <input type="submit"   value="You are about to delete the User - Please Confirm" id="deleteconfirmbuttonok" class="btn btn-danger form-control"  onclick="deluserbtnverify();resetBut();"/>
    </form>

</div>
<script>



    function  deluserbtn()
    {


                {
                    $('#unhideSubmit').hide();
                    $('#deleteconfirmbuttonok').show();

                }
        return false;
    }


    $('#deleteconfirmbuttonok').hide();

    function resetButto()
    {
        $('#unhideSubmit').show();
        $('#deleteconfirmbuttonok').hide();
    }




</script>
<?php
}// end if admin
?>

