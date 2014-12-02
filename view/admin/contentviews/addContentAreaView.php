
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
<h1>Add new Content Area</h1>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Alias</th>
      <th>Description</th>
      <th>Order</th>
    </tr>
  </thead>
  <form name="addNewContentArea"  id="addNewContentArea" class="addNewContentArea" onclick ="$('#addContentASubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="addNewContentAreaForm">
    <tbody>
      <tr>
        <td><input oninput="resetBut()" type="text" name ="c_name" required /></td>
        <td><input oninput="resetBut()" type="text" name ="c_alias" required /></td>
        <td><input oninput="resetBut()" type="text" name ="c_desc" required /></td>
        <td><input oninput="resetBut()" type="text" name ="c_order" required /></td>
        <input type="hidden" name="formSubmitNewContentArea" value="true" required/>
        <td><span class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify</span>
        <input type="submit" class="btn btn-default" id="addContentASubmit" onclick="verifyf();resetBut();" value="Confirm" /></td>
      </tr>
    </tbody>
  </form>
  <tfoot></tfoot>
</table>

<script>
    function  verifyf()
    {
//        if (document.forms['addNewPageForm']['p_name'].value.length>5)
//      if   (document.forms['addNewPageForm']['p_alias'].value.length>5)
//        if( document.forms['addNewPageForm']['p_desc'].value.length>20)
//    {
        $('#formConfirm').hide();
        $('#addContentASubmit').show();
    }


    $('#addContentASubmit').hide()

    function resetBut()
    {
        $('#formConfirm').show();
        $('#addContentASubmit').hide();
    }
</script>