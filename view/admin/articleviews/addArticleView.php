
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
<h1>Add new Article</h1>
<table class="table">
  <thead>
    <tr>
      <th>Content Area</th>
      <th>Name</th>
      <th>Title</th>
      <th>Description</th>
      <th>Blurb</th>
      <th>Content</th>
      <th>Associated Page</th>
    </tr>
  </thead>
  <form name="addNewArticle"  id="addNewArticle" class="addNewArticle" onclick ="$('#addArticleSubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="addNewPageForm">
    <tbody>
      <tr>
        <td><input oninput="resetBut()" type="text" name ="a_contentarea" required /></td>
        <td><input oninput="resetBut()" type="text" name ="a_name" required /></td>
        <td><input oninput="resetBut()" type="text" name ="a_title" required /></td>
        <td><input oninput="resetBut()" type="text" name ="a_desc" required /></td>
        <td><input oninput="resetBut()" type="text" name ="a_blurb" required /></td>

        // TinyMCE WOULD GO HERE!
        <td><input oninput="resetBut()" type="text" name ="a_content" required /></td>
        // TinyMCE WOULD GO HERE!

        <td><input oninput="resetBut()" type="text" name ="a_assocpage" required /></td>
        <input type="hidden" name="formSubmitNewArticle" value="true" required/>
        <td><span class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify</span>
        <input type="submit" class="btn btn-default" id="addArticleSubmit" onclick="verifyf();resetBut();" value="Confirm" /></td>
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
    $('#addArticleSubmit').show();
  }


  $('#addArticleSubmit').hide()

  function resetBut()
  {
    $('#formConfirm').show();
    $('#addArticleSubmit').hide();
  }
</script>