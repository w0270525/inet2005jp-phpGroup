<?php

class articleForm{


public $article;
public $id;
PUBLIC  function __construct($uniqueId,$article){
    $this->id= $uniqueId;
    $this->article = $article;
}




          function showEditContentForm()
          {
              $article= $this->article;

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
                      <label class="col-sm-2 control-label">Content Area</label><div class="col-sm-10"><input oninput="resetBut()" type="int" name = "a_contentarea"  class="form-control" value ="<?php echo $article->getContentArea()?>"/>
                      </div>
                      <label class="col-sm-2 control-label">Page</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_page"  class="form-control" value ="<?php echo $article->getAssocPage();?>"/>
                      </div>


                      <label >All Page
                          <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="all_page"    value ="" <?php if($article->getAllPages()) echo 'checked';?> />
                          </div>
                      </label>
                      <label>Inactive
                          <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="a_inactive"  value ="" <?php if($article->getActive()) echo 'checked';?>   />
                          </div>
                      </label>




                       <input type="hidden" name = "formEditArticleConfirm" value="true" required/>
                      <div class="col-sm-10">  <label><span  class="btn btn-default form-control" onclick="verifyff()" id="formConfirm<?php echo $this->id ?>()">Verify </span>
                      <input type="submit" class="btn btn-default form-control" id="updateArticle<?php echo $this->id ?>" onclick="verifyff();resetBut(); " value ="true" >  </label>
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