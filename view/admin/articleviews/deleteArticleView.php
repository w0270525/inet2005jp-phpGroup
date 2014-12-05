
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

    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#formAdeleterticle">Add  New Article  </button>
    <div id="formAdeleterticle" class="collapse in">



        <form name="formSDeleteArticle"  id="formSDeleteArticle" class="form"   action="#" method="post"  >


            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input oninput="resetButDelteFrom()" type="text" name = "a_name"  class="form-control" value=<?php echo $article->getTitle()?> />
            </div>
            <label class="col-sm-2 control-label">Article</label>
            <div class="col-sm-10"><input oninput="resetButDelteFrom()" type="text" name = "a_title"  class="form-control" value=<?php echo $article->getTitle()?> required />
            </div>
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10"><input oninput="resetButDelteFrom()" type="text" name = "a_desc"  class="form-control"  value=<?php echo $article->getDesc()?>/>
            </div>
            <label class="col-sm-2 control-label">Blurb</label>
            <div class="col-sm-10"><input oninput="resetButDelteFrom()" type="text" name = "a_blurb"  class="form-control" value=<?php echo $article->getBlurb()?>/>
            </div>

            <label class="col-sm-2 control-label">Article Body (Content)</label>
            <div class="col-sm-10"><textarea oninput="resetButDelteFrom()" rows="20" cols="120" name = "a_content"  class="form-control"> value=<?php echo $article->getContent()?></textarea>
            </div>
            <label class="col-sm-2 control-label">Content Area</label>
            <div class="col-sm-10"><input oninput="resetButDelteFrom()" type="text" name = "a_contentarea"  class="form-control" value=<?php echo $article->getContentArea()?>/>
            </div>
            <label class="col-sm-2 control-label">Page</label>
            <div class="col-sm-10"><input oninput="resetButDelteFrom()" type="text" name = "a_page"  class="form-control" value=<?php echo $article->getAssocpage()?>/>
            </div>
            <label class="col-sm-2 control-label">All Page</label>
            <div class="col-sm-10"><input oninput="resetButDelteFrom()" type="checkbox" name = "all_page"  value=<?php echo $article->getAllpages()?> class="form-control" />
            </div>

            <!-- used by the back end for processing -->
            <input type="hidden" name = "formDelteeConfirm" value="true" />
            <input type="hidden" name = "id" value="<?php echo $article->getId()?>">





            <span class="btn btn-warning form-control" id="formConfirm" onclick="ConfirmDdeleteArticleAction()" >Delete This Record</span>
            <input type="submit" class="btn btn-danger form-control" id="removeItem" onclick="resetButDelteFrom();" value="Action cannot be undone - Confirm Delete" />

        </form>
    </div>
<?php
endforeach;
?>

<script>
    function  ConfirmDdeleteArticleAction()
    {

        $('#formConfirm').hide();
        $('#removeItem').show();

    }


    $('#removeItem').hide()

    function resetButDelteFrom()
    {
        $('#formAddStyleConfirm').show();
        $('#removeItem').hide();
    }
</script>



