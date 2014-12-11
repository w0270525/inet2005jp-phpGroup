
<?php
  if(!empty($lastOperationResults)):
?>
<h2><?php echo $lastOperationResults; ?></h2>
<?php
  endif;
?>
    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#addapagestabl">Add A new Page </button>
    <div id="addapagestabl" class="collapse in">

    <table class="table">
  <thead>
  <tr>
    <th>Name</th>
    <th>Alias</th>
    <th>Description</th>
  </tr>
  </thead>
  <form name="addNewPageForm" id="addNewPageForm" class="addNewPageForm" onclick ="$('#addPageSubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="addNewPageForm">
    <tbody>
    <tr>
      <td><input oninput="resetBut()" type="text" name ="p_name" required /></td>
      <td><input oninput="resetBut()" type="text" name ="p_alias" required /></td>
      <td><input oninput="resetBut()" type="text" name ="p_desc" /></td>
      <input type="hidden" name="formSubmitNewPage" value="true" required />
      <td><span class="btn btn-default" id="formConfirmAddPagfe" onclick="verifyformpageadd()" >Verify</span>
        <input type="submit" class="btn btn-default" id="addPageSubmit" onclick="verifyformpageadd();resetBut();" value="Confirm" /></td>
    </tr>
    </tbody>
  </form>
  <tfoot></tfoot>
</table>
    </div>
<script>
    function  verifyformpageadd()
    {
//        if (document.forms['addNewPageForm']['p_name'].value.length>5)
//        if (document.forms['addNewPageForm']['p_alias'].value.length>5)
//        if (document.forms['addNewPageForm']['p_desc'].value.length>20)
//    {
        $('#formConfirmAddPagfe').hide();
        $('#addPageSubmit').show();
    }


    $('#addPageSubmit').hide();

    function resetBut()
    {
        $('#formConfirmAddPagfe').show();
        $('#addPageSubmit').hide();
    }
</script>


