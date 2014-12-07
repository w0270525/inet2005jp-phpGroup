
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

<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#formArticle">Add  New Article  </button>
<div id="formArticle" class="collapse in">

 
 
    <form name="formSubmitNewArticle"  id="formSubmitNewArticle" class="form" onclick ="$('#addPageSubmit').hide();$('#verifyf').show()"
          action="#" method="post" value="addNewPageForm">
        

            <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input oninput="resetBut()" type="text" name="a_name" class="form-control" required />
                 </div>
           <label class="col-sm-2 control-label">Article</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_title" class="form-control" required/>
                     </div>
            <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_desc" class="form-control"  required/>
                    </div>
            <label class="col-sm-2 control-label">Blurb</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_blurb" class="form-control" required/>
            </div>

        <label class="col-sm-2 control-label">Article Body (Content)</label>
                <div class="col-sm-10"><textarea oninput="resetBut()" rows="20" cols="120" name="a_content" class="form-control" id="html-content"></textarea>
                </div>
         <label class="col-sm-2 control-label">Content Area</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_contentarea"  class="form-control" required/>
                </div>
            <label class="col-sm-2 control-label">Page</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_page"  class="form-control" required/>
            </div>
            <label class="col-sm-2 control-label">All Page</label>
        <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="all_page"  class="form-control" />
        </div>

        <input type="hidden" name = "formSubmitNewArticleConfirm" value="true" required/>
          <label><div class="col-sm-10"><span  class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify </span></div>
              <input type="submit" class="btn btn-default" id="addNewArticle" onclick="verifyf();resetBut(); " value ="true" >  </label>


    </form>


 </div>
 <script>
    function  verifyf()
    {
            if (document.forms['formSubmitNewArticle']['a_name'].value.length>5)
                  if   (document.forms['formSubmitNewArticle']['a_alias'].value.length>5)
                         if( document.forms['formSubmitNewArticle']['a_desc'].value.length>20)
        {
            $('#formConfirm').hide();
            $('#addNewArticle').show();
        }
    }


    $('#addNewArticle').hide()

    function resetBut()
    {
        $('#formConfirm').show();
        $('#addNewArticle').hide();
    }
</script>