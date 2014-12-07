
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

foreach($arrayOfArticles as $article):
?>


<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#editArtform_">Edit Article <?php echo $article->getName(); ?></button>
<div id="editArtform_" class="collapse in">
    <form name="formUpdateArticleConfirm"  id="formUpdateArticleConfirm" class="form" onclick ="$('#addPageSubmit').hide();$('#verifyf').show()"
          action="#" method="post" value="addNewPageForm">


        <label class="col-sm-2 control-label">Name</label><input type="hidden" name="a_id" value=<?php echo $article->getId()?> />
            <div class="col-sm-10">
            <input oninput="resetBut()" type="text" name = "a_name"  class="form-control" value =<?php echo $article->getName() ?> required />
        </div>
        <label class="col-sm-2 control-label">Article</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_title"  class="form-control" value =<?php echo $article->getTitle()?> required/>
        </div>
        <label class="col-sm-2 control-label">Description</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_desc"  class="form-control"  value =<?php echo $article->getDesc()?>required/>

        </div>
        <label class="col-sm-2 control-label">Blurb</label> <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_blurb"  class="form-control" value =<?php echo $article->getBlurb()?> />
        </div>

        <label class="col-sm-2 control-label">Article Body (Content)</label> <div class="col-sm-10"><textarea oninput="resetBut()" rows="20" cols="120" name = "a_content" id="html-content"  class="form-control"><?php echo $article->getContent()?></textarea>
        </div>
        <label class="col-sm-2 control-label">Content Area</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_contentarea"  class="form-control" value ="<?php echo $article->getContentArea()?>"/>
        </div>
        <label class="col-sm-2 control-label">Page</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_page"  class="form-control" value ="<?php echo $article->getAssocPage()?>"/>
        </div>
        <label class="col-sm-2 control-label">All Page</label> <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name = "all_page"  class="form-control" value ="<?php echo $article->getAllPages()?>"/>

        </div>

        <input type="hidden" name = "formEditArticleConfirm" value="true" required/>
        <div class="col-sm-10">  <label><span  class="btn btn-default" onclick="verifyf()" id="formConfirm">Verify </span>
        <input type="submit" class="btn btn-default" id="updateArticle" onclick="verifyf();resetBut(); " value ="true" >  </label>
        </div>
    </form>
 </div>
<?php
endforeach;

?>

<script>
    function  verifyf()
    {
//        if (document.forms['addNewPageForm']['p_name'].value.length>5)
//      if   (document.forms['addNewPageForm']['p_alias'].value.length>5)
//        if( document.forms['addNewPageForm']['p_desc'].value.length>20)
//    {
        $('#formConfirm').hide();
        $('#addPageSubmit').show();
    }


    $('#addPageSubmit').hide()

    function resetBut()
    {
        $('#formConfirm').show();
        $('#addPageSubmit').hide();
    }
</script>