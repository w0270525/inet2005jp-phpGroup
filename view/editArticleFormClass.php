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

?>

              <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#editArtform_<?php echo $this->id ?>">Edit Article <?php echo $this->article->getName(); ?></button>
              <div id="editArtform_<?php echo $this->id ?>" class="collapse in">
                  <form name="formUpdateArticleConfirm<?php echo $this->id ?>"  id="formUpdateArticleConfirm" class="form" onclick ="$('#addPageSubmit').hide();$('#verifyf').show()"
                        action="#" method="post" value="addNewPageForm">


                      <label class="col-sm-2 control-label">Name</label><input type="hidden" name="a_id" value=<?php echo $this->article->getId()?> />
                      <div class="col-sm-10">
                          <input oninput="resetBut()" type="text" name = "a_name"  class="form-control" value =<?php echo $this->article->getName() ?> required />
                      </div>
                      <label class="col-sm-2 control-label">Article</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_title"  class="form-control" value =<?php echo $this->article->getTitle()?> required/>
                      </div>
                      <label class="col-sm-2 control-label">Description</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_desc"  class="form-control"  value =<?php echo $this->article->getDesc()?>required/>

                      </div>
                      <label class="col-sm-2 control-label">Blurb</label> <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_blurb"  class="form-control" value =<?php echo $this->article->getBlurb()?> />
                      </div>

                      <label class="col-sm-2 control-label">Article Body (Content)</label> <div class="col-sm-10"><textarea oninput="resetBut()" rows="20" cols="120" name = "a_content"  class="form-control"><?php echo $this->article->getContent()?></textarea>
                      </div>
                      <label class="col-sm-2 control-label">Content Area</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_contentarea"  class="form-control" value =<?php echo $this->article->getContentArea()?>/>
                      </div>
                      <label class="col-sm-2 control-label">Page</label><div class="col-sm-10"><input oninput="resetBut()" type="text" name = "a_page"  class="form-control" alue =<?php echo $this->article->getAssocPage()?>/>
                      </div>
                      <label class="col-sm-2 control-label">All Page</label> <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name = "all_page"  class="form-control" alue =<?php echo $this->article->getAllPages()?>/>
                      </div>

                      <input type="hidden" name = "formSubmitNewArticleConfirm" value="true" required/>
                      <div class="col-sm-10">  <label><span  class="btn btn-default" onclick="verifyf<?php echo $this->id ?>()" id="formConfirm<?php echo $this->id ?>">Verify </span>
                              <input type="submit" class="btn btn-default" id="updateArticle<?php echo $this->id ?>" onclick="verifyf()<?php echo $this->id ?>;resetBut(); " value ="true" >  </label>
                      </div>
                  </form>
              </div>


                <script>
               $('#meditArtform_<?php echo $this->id ?>').collapse(hide);
               //       $('.collapse').collapse()
                function  verifyf<?php echo $this->id ?>()
                {
                if (document.forms['formUpdateArticleConfirm<?php echo $this->id ?>"']['a_name'].value.length>5)
                if   (document.forms['formUpdateArticleConfirm<?php echo $this->id ?>"']['a_alias'].value.length>5)
                if( document.forms['formUpdateArticleConfirm<?php echo $this->id ?>"']['a_desc'].value.length>20)
                {
                  $('#formConfirm').hide();
                  $('#addPageSubmit').show();
                }


                $('#addPageSubmit<?php echo $this->id ?>').hide()

                function resetBut()
                {
                  $('#formConfirm<?php echo $this->id ?>').show();
                  $('#addPageSubmit<?php echo $this->id ?>').hide();
                }
                </script>

                <?php
}// end show ffomr


} // end class