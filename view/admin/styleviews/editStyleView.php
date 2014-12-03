
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
<h1>Update Style</h1>
<table class="table">
  <thead>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Style</th>
  </tr>
  </thead>
  <form name="updateContentAreaForm"  id="updateContentAreaForm" class="updateContentAreaForm" onclick ="$('#updateContentAreaSubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="updateContentAreaForm">
    <tbody>
    <tr>
      <td><input oninput="resetBut()" type="text" name ="s_name" value="<?php echo $style->getName(); ?>" required /></td>
      <td><input oninput="resetBut()" type="text" name ="s_alias" value="<?php echo $style->getAlias(); ?>" required /></td>
      <td><input oninput="resetBut()" type="text" name ="s_desc" value="<?php echo $style->getDesc(); ?>" required /></td>


      // No idea what this is for...
      <input type="hidden" name = "formSubmitUpdateContentArea" value="true" required />
      // No idea what this is for...


      <td><span class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify</span>
        <input type="submit" class="btn btn-default" id="updateContentAreaSubmit" onclick="verifyf();resetBut();" value="Confirm" /></td>
    </tr>
    </tbody>
  </form>
  <tfoot></tfoot>
</table>

<script>
  function  verifyf()
  {
//        if (document.forms['updateContentAreaForm']['p_name'].value.length>5)
//      if   (document.forms['updateContentAreaForm']['p_alias'].value.length>5)
//        if( document.forms['updateContentAreaForm']['p_desc'].value.length>20)
//    {
    $('#formConfirm').hide();
    $('#updateContentAreaSubmit').show();
  }


  $('#updateContentAreaSubmit').hide()

  function resetBut()
  {
    $('#formConfirm').show();
    $('#updateContentAreaSubmit').hide();
  }
</script>