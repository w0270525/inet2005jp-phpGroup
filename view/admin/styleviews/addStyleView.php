
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
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Style</th>
    </tr>
  </thead>
  <form name="addNewStyle"  id="addNewStyle" class="addNewStyle" onclick ="$('#addStyleubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="addNewStyleForm">
    <tbody>
      <tr>
        <td><input oninput="resetBut()" type="text" name ="s_name" required /></td>
        <td><input oninput="resetBut()" type="text" name ="s_alias" required /></td>
        <td><input oninput="resetBut()" type="text" name ="s_desc" required /></td>
        <input type="hidden" name="formSubmitNewStyle" value="true" required/>
        <td><span class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify</span>
          <input type="submit" class="btn btn-default" id="addStyleSubmit" onclick="verifyf();resetBut();" value="Confirm" /></td>
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
    $('#addStyleSubmit').show();
  }


  $('#addStyleSubmit').hide()

  function resetBut()
  {
    $('#formConfirm').show();
    $('#addStyleSubmit').hide();
  }
</script>