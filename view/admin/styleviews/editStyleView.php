
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

<?php
  if(!empty($lastOperationResults)):
?>
<h2><?php echo $lastOperationResults; ?></h2>
<?php
  endif;
  foreach($arrayOfStyles as $style):
?>
<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#editstyleforbsaddNewStyleFORM" id="styleeditidbsbutton">Edit Style<?php echo $style->getName(); ?></button>
<div id="editstyleforbsaddNewStyleFORM" class="collapse in">


<form name="addNewStyleFORM" id="addNewStyleFORM" class="addNewStyleFORM" onclick ="$('#addStyleubmit').hide();$('#verifyf').show()"
      action="#" method="post" value="addNewStyleForm">
    <label>Name</label>
    <input oninput="resetButStyleAdd()" type="text" name="s_name" class="form-control" value="<?php echo $style->getName(); ?>" required />

    <label> Description</label>
    <input oninput="resetButStyleAdd()" type="text" name="s_desc" class="form-control" value="<?php echo $style->getdesc(); ?>" />

    <label>CSS</label>
    <pre>
      <textarea class="form-control" rows="13" oninput="resetButStyleAdd()" type="text" name="s_style" required >
            <?php echo $style->getStyle(); ?>
      </textarea>
    </pre>
    <!-- USED FOR BACKEND FORM VERIFICATION -->
    <input type="hidden" name="formUpdateStyle" value="true" required/>
    <input type="hidden" name="s_id" value="<?php echo $style->getId()?>" required/>


    <span class="btn btn-default" id="formAddStyleConfirm" onclick="verifyFormAddStyle()" >Verify</span>
    <input type="submit" class="btn btn-default" id="addStyleSubmit" onclick="verifyFormAddStyle();resetButStyleAdd();" value="Confirm" />

</form>
 </div>
<?php
  endforeach;
?>

<script>
    function  verifyFormAddStyle()
    {
        if (document.forms['addNewStyleFORM']['s_name'].value.length>5)
            if   (document.forms['addNewStyleFORM']['s_desc'].value.length>5)
                if( document.forms['addNewStyleFORM']['s_style'].value.length>10)
                {
                    $('#formAddStyleConfirm').hide();
                    $('#addStyleSubmit').show();
                }
    }


    $('#addStyleSubmit').hide()

    function resetButStyleAdd()
    {
        $('#formAddStyleConfirm').show();
        $('#addStyleSubmit').hide();
    }
</script>



