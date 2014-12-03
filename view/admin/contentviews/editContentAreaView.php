
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
<h1>Update Content Area</h1>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Alias</th>
      <th>Description</th>
      <th>Order</th>
    </tr>
  </thead>
  <form name="updateContentAreaForm"  id="updateContentAreaForm" class="updateContentAreaForm" onclick ="$('#updateContentAreaSubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="updateContentAreaForm">
    <tbody>
      <tr>
        <td><input oninput="resetBut()" type="text" name ="c_name" value="<?php echo $contentarea->getName(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name ="c_alias" value="<?php echo $contentarea->getAlias(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name ="c_desc" value="<?php echo $contentarea->getDesc(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name ="c_order" value="<?php echo $contentarea->getOrder(); ?>" required /></td>


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