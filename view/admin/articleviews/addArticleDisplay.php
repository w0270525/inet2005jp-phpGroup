

<?php
if(!empty($lastOperationResults)):
    ?>
    <h2><?php echo $lastOperationResults; ?></h2>
<?php
endif;
$ca = new ContentAreaModel();
$this->contentAreas = $ca->getAllContentAreas();
$pa = new PageModel();
$this->pages=$pa->getAllPages();
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
                <div class="col-sm-10"><textarea oninput="resetBut()" rows="20" cols="120" name="a_content" id="html-content" class="form-control"></textarea>
                </div>

        <label for="number">Select a page</label>
        <select name="a_page" id="a_page">

            <?php foreach($this->pages as $page):?>

                <option><?php echo $page->getId()?> </option>
            <?php endforeach;?>
        </select>

        <label for="number">Specify Content Area</label>
        <select name="a_contentarea" id="a_contentarea">
            <?php foreach($this->contentAreas as $contentArea):?>
                <option><?php echo $contentArea->getId()?> </option>
            <?php endforeach;?>


        </select>



        <label class="col-sm-2 control-label"  title="Set the article to be viewed on all pages">All Page
                <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="all_page"    />
                </div>                               </label>
        <label class="col-sm-2 control-label"   title="Set the article to be viewed only by authors">Inactive
                  <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="a_inactive"    />
                  </div>                      </label>
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

        {
            $('#formConfirm').hide();
            $('#addNewArticle').show();
        }
    }


    $('#addNewArticle').hide();

    function resetBut()
    {
        $('#formConfirm').show();
        $('#addNewArticle').hide();
    }
</script>