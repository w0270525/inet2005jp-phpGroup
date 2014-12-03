
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
<h1>Update Article</h1>
<table class="table">
  <thead>
    <tr>
      <th>Content Area</th>
      <th>Name</th>
      <th>Title</th>
      <th>Description</th>
      <th>Blurb</th>
      <th>Content</th>
      <th>Associated Article</th>
    </tr>
  </thead>
  <form name="updateArticleForm"  id="updateArticleForm" class="updateArticleForm" onclick ="$('#updateArticleSubmit').hide();$('#verifyf').show()"
        action="#" method="post" value="updateArticleForm">
    <tbody>
      <tr>
        <td><input oninput="resetBut()" type="text" name="a_contentarea" value="<?php echo $article->getContentArea(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name="a_name" value="<?php echo $article->getName(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name="a_title" value="<?php echo $article->getTitle(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name="a_desc" value="<?php echo $article->getDesc(); ?>" required /></td>
        <td><input oninput="resetBut()" type="text" name="a_blurb" value="<?php echo $article->getBlurb(); ?>" required /></td>


        // TinyMCE WOULD GO HERE!
        <td><input oninput="resetBut()" type="text" name="a_content" value="<?php echo $article->getContent(); ?>" required /></td>
        // TinyMCE WOULD GO HERE!


        <td><input oninput="resetBut()" type="text" name="a_assocpage" value="<?php echo $article->getAssocArticle(); ?>" required /></td>

        
        // No idea what this is for...
        <input type="hidden" name = "formSubmitUpdateArticle" value="true" required />
        // No idea what this is for...


        <td><span class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify</span>
          <input type="submit" class="btn btn-default" id="updateArticleSubmit" onclick="verifyf();resetBut();" value="Confirm" /></td>
      </tr>
    </tbody>
  </form>
  <tfoot></tfoot>
</table>

<script>
  function  verifyf()
  {
//        if (document.forms['updateArticleForm']['p_name'].value.length>5)
//      if   (document.forms['updateArticleForm']['p_alias'].value.length>5)
//        if( document.forms['updateArticleForm']['p_desc'].value.length>20)
//    {
    $('#formConfirm').hide();
    $('#updateArticleSubmit').show();
  }


  $('#updateArticleSubmit').hide()

  function resetBut()
  {
    $('#formConfirm').show();
    $('#updateArticleSubmit').hide();
  }
</script>