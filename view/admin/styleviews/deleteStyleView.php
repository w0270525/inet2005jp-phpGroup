
<?php
if(!empty($lastOperationResults)):
    ?>
    <h2><?php echo $lastOperationResults; ?></h2>
<?php
endif;
foreach($arrayOfStyles as $style):
    ?>
    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">  Edit Style <?php echo $style->getName(); ?></button>
    <div id="demo" class="collapse in">



        <form name="addNewStyleFORM"  id="addNewStyleFORM" class="addNewStyleFORM" onclick ="$('#addStyleubmit').hide();$('#verifyf').show()"
              action="#" method="post" value="addNewStyleForm">
            <label>Name</label>
            <input oninput="resetButStyleAdd()" type="text" name ="s_name"  class="form-control" required value="<?php echo $style->getName(); ?>"/>

            <label> Description</label>
            <input oninput="resetButStyleAdd()" type="text" name ="s_desc"  class="form-control" required / value="<?php echo $style->getdesc(); ?>" >

            <label>CSS</label><pre>
    <textarea  class="form-control" rows="13"    oninput="resetButStyleAdd()" type="text" name ="s_style"   required >
        <?php echo $style->getStyle(); ?>
    </textarea></pre>
            <!-- USED FOR BACKEND FORM VERIFICATION -->
            <input type="hidden" name="deleteFormConfirm" value="<?php echo $style->getId()?>" required/>


            <span class="btn btn-warning" id="formAddStyleConfirm" onclick="verifyFormAddStyle()" >Delete This Record</span>
            <input type="submit" class="btn btn-danger" id="addStyleSubmit" onclick="verifyFormAddStyle();resetButStyleAdd();" value="Action cannot be undone - Confirm Delete" />

        </form>
    </div>
<?php
endforeach;
?>

<script>
    function  verifyFormAddStyle()
    {

                    $('#formAddStyleConfirm').hide();
                    $('#addStyleSubmit').show();

    }


    $('#addStyleSubmit').hide()

    function resetButStyleAdd()
    {
        $('#formAddStyleConfirm').show();
        $('#addStyleSubmit').hide();
    }
</script>



