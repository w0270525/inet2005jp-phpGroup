
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

 
 
    <form name="formSubmitNewArticle"  id="formSubmitNewArticle" class="form"  action="#" method="post" >
        

            <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input oninput="resetBut()" type="text" name="a_name" class="form-control" required />
                 </div>
           <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_title" class="form-control" required/>
                     </div>
            <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_desc" class="form-control"  />
                    </div>
            <label class="col-sm-2 control-label">Blurb</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_blurb" class="form-control" />
            </div>

            <label class="col-sm-2 control-label">Article Body (Content)</label>
                    <div class="col-sm-10"><textarea oninput="resetBut()" rows="20" cols="120" name="a_content" class="form-control"></textarea>
                    </div>
             <label class="col-sm-2 control-label">Content Area</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_contentarea"  class="form-control" required/>
                    </div>
             <label class="col-sm-2 control-label">Page</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name="a_page"  class="form-control" required/>
                    </div>
            <label class="col-sm-2 control-label">All Page
                    <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="all_page"    />
                    </div>                               </label>
            <label class="col-sm-2 control-label">Inactive
                      <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="a_inactive"    />
                  </div>                      </label>
            <input type="hidden" name = "formSubmitNewArticleConfirm" value="true" required/>
            <div class="btn btn-default form-control" id="formConfirmNewArt" onclick="verifynewaeticleformf()" >Verify  </div>
            <input type="submit" class="btn btn-default form-control" id="addNewArticleformSubmt" onclick="verifynewaeticleformf();resetBut(); " value ="true" />


    </form>


 </div>
 <script>
    function  verifynewaeticleformf()
    {
            if (document.forms['formSubmitNewArticle']['a_name'].value.length>5)
            if   (document.forms['formSubmitNewArticle']['a_title'].value.length>5){

            $('#formConfirmNewArt').hide();
            $('#addNewArticleformSubmt').show();
            }

    }


    $('#addNewArticleformSubmt').hide();

    function resetBut()
    {
        $('#formConfirmNewArt').show();
        $('#addNewArticleformSubmt').hide();
    }
</script>