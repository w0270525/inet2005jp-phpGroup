
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
?>
<h1>Add new Style</h1>


  <form name="addNewStyleFORM"  id="addNewStyleFORM" class="addNewStyleFORM" onclick ="$('#addStyleubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="addNewStyleForm">
      <label>Name</label>
            <input oninput="resetButStyleAdd()" type="text" name ="s_name"  class="form-control" required />

      <label> Description</label>
            <input oninput="resetButStyleAdd()" type="text" name ="s_desc"  class="form-control" required />

      <label>CSS</label>
            <textarea  class="form-control" rows="13"    oninput="resetButStyleAdd()" type="text" name ="s_style" value = "" required >cSS HERE</textarea>

      <!-- USED FOR BACKEND FORM VERIFICATION -->
      <input type="hidden" name="formSubmitNewStyle" value="true" required/>


      <span class="btn btn-default" id="formAddStyleConfirm" onclick="verifyFormAddStyle()" >Verify</span>
      <input type="submit" class="btn btn-default" id="addStyleSubmit" onclick="verifyFormAddStyle();resetButStyleAdd();" value="Confirm" />

  </form>


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