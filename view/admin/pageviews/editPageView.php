

<?php
  if(!empty($lastOperationResults)):
?>
<h2><?php echo $lastOperationResults; ?></h2>
<?php
  endif;
?>
<<h1>Update Page</h1>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Alias</th>
      <th>Description</th>
    </tr>
  </thead>
  <form name="updatePageForm"  id="updatePageForm" class="updatePageForm" onclick ="$('#updatePageSubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="updatePageForm">
    <tbody>
      <tr>
        <td><input oninput="resetBut()" type="text" name ="p_name" value="<?php echo $page->getName(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name ="p_alias" value="<?php echo $page->getAlias(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name ="p_desc" value="<?php echo $page->getDesc(); ?>" required /></td>

        // No idea what this is for...
        <input type="hidden" name = "formSubmitUpdatePage" value="true" required />
        // No idea what this is for...

        <td><span class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify</span>
          <input type="submit" class="btn btn-default" id="updatePageSubmit" onclick="verifyf();resetBut();" value="Confirm" /></td>
      </tr>
    </tbody>
  </form>
  <tfoot></tfoot>
</table>

<script>
    function  verifyf()
    {
//        if (document.forms['updatePageForm']['p_name'].value.length>5)
//      if   (document.forms['updatePageForm']['p_alias'].value.length>5)
//        if( document.forms['updatePageForm']['p_desc'].value.length>20)
//    {
        $('#formConfirm').hide();
        $('#updatePageSubmit').show();
    }


    $('#updatePageSubmit').hide()

    function resetBut()
    {
        $('#formConfirm').show();
        $('#updatePageSubmit').hide();
    }
</script>