<?php

class articleForm{


public $article;
public $id;
public $contentArea;
private $contentAreas;
private $pages;
private $page;

PUBLIC  function __construct($uniqueId,$article,$CA,$page){
    $this->id= $uniqueId;
    $this->article = $article;
    $this->contentArea=$CA;
}


    function getContentArea()
    {
        $ca = new ContentAreaModel();
        $this->contentAreas = $ca->getAllContentAreas();
        $pa = new PageModel();
        $this->pages=$pa->getAllPages();
    }



          function showEditContentForm()
          {
              $article= $this->article;
              $this->getContentArea();
            //  $ca = $this->contentArea;
              $page = $this->page;

?>
              <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#editArtform_<?php echo $this->id ?>">Edit Article  <?php echo $this->article->getName(); ?></button>
              <div id="editArtform_<?php echo $this->id ?>" class="collapse in">
                  <form name="formUpdateArticleConfirm<?php echo $this->id ?>"  id="formUpdateArticleConfirm" class="form"   action="#" method="post" value="addNewPageForm">

                      <label class="col-sm-2 control-label">Name</label><input type="hidden" name="a_id" value=<?php echo $article->getId()?> />
                      <div class="col-sm-10">
                          <input oninput="resetBut()" type="text" name = "a_name"  class="form-control" value =<?php echo $article->getName() ?> required />
                      </div>
                      <label class="col-sm-2 control-label">Article</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_title"  class="form-control" value ="<?php echo $article->getTitle()?>" required/>
                      </div>
                      <label class="col-sm-2 control-label">Description</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_desc"  class="form-control"  value ="<?php echo $article->getDesc()?>" />

                      </div>
                      <label class="col-sm-2 control-label">Blurb</label> <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_blurb"  class="form-control" value ="<?php echo $article->getBlurb()?>" />
                      </div>



                      <label class="col-sm-2 control-label">Article Body (Content)</label> <div class="col-sm-10"><textarea oninput="resetBut()" rows="20" cols="120" name = "a_content" id="html-content" class="form-control"><?php echo $article->getContent()?></textarea>
</div>
                          <label for="number">Page Number</label>
                          <select name="a_page" id="a_page">
                              <?php foreach($this->pages as $page):?>
                                  <option ><?php echo $page->getId()?> </option>
                              <?php endforeach;?>


                          </select>
                          <label for="number">Specify Content Area</label>
                          <select name="a_contentarea" id="a_contentarea">
                              <?php foreach($this->contentAreas as $contentArea):?>
                                  <option <?php if($this->contentArea->getId()==$article->getContentarea()){?>selected="true"<?php } ?>><?php echo $contentArea->getId()?> </option>
                              <?php endforeach;?>


                          </select>


                      <label  title="Set the article to be viewed on all pages">All Page
                          <div class="col-sm-10"><input oninput="resetBut()" class= "form-control" type="checkbox" name="all_page"    value ="" <?php if($article->getAllPages()) echo 'checked';?> />
                          </div>
                      </label>
                      <label  title="Set the article to be viewed on only by authors">Inactive
                          <div class="col-sm-10"><input oninput="resetBut()" class= "form-control"  type="checkbox" name="a_inactive"  value ="" <?php if($article->getActive()) echo 'checked';?>   />
                          </div>
                      </label>



                       <input type="hidden" name = "formEditArticleConfirm" value="true" required/>
                      <div class="col-sm-10">  <label><span  class="btn btn-default form-control" onclick="verifyff()" id="formConfirm<?php echo $this->id ?>()">Verify </span>
                      <input type="submit" class="btn btn-default form-control" id="updateArticle<?php echo $this->id ?>" onclick="verifyff();resetBut(); " value ="true" />  </label>
                      </div>


<script>
 /*  hide the divs */
$('.collapse').collapse();


function  verifyff()
{
if (document.forms['formUpdateArticleConfirm<?php echo $this->id ?>']['a_name'].value.length>5)
if   (document.forms['formUpdateArticleConfirm<?php echo $this->id ?>']['a_alias'].value.length>5)
if      ( document.forms['formUpdateArticleConfirm<?php echo $this->id ?>']['a_desc'].value.length>20)
{

$("#formConfirm<?php echo $this->id ?>()").hide();
$("#updateArticle<?php echo $this->id ?>").show();
}
}

$("#updateArticle<?php echo $this->id ?>" ).hide();

function resetBut()
{
$('#formConfirm<?php echo $this->id ?>').show();
$('#updateArticle<?php echo $this->id ?>').hide();
}

</script>
              </form>
              </div>

                <?php
}// end show ffomr


} // end class