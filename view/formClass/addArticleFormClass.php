<?php

class addArticleForm{

    public $page;
    public $contentArea;
    private $contentAreas;
    private $pages;
    public $id;
    PUBLIC  function __construct($uniqueId,$contentArea,$page){
        $this->id= $uniqueId;
        $this->contentArea = $contentArea;
        $this->page=$page;
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
        $this->getContentArea();
        $ca = $this->contentArea;
        $page = $this->page;

        ?>
        <button type="button" class="btn btn-default pull-left" data-toggle="collapse" data-target="#adinpge<?php echo $this->id ?>">Add Article to Content area <?php echo $this->contentArea->getName(); ?></button>
        <div id="adinpge<?php echo $this->id ?>" class="collapse in">


                <form name="formSubmitNewArticle"  id="formSubmitNewArticle" class="form" onclick ="$('#addPageSubmit').hide();$('#verifyf').show()"
                      action="#" method="post" >


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


                        <label for="number">Page Number</label>
                        <select name="a_Assocpage" id="a_Assocpage">
                            <?php foreach($this->pages as $page):?>
                            <option ><?php echo $page->getId()?> </option>
                             <?php endforeach;?>


                        </select>
                    <label for="number">Specify Content Area</label>
                    <select name="a_contentarea" id="a_contentarea">
                        <?php foreach($this->contentAreas as $contentArea):?>
                            <option <?php if($contentArea->getAssocpage()==$ca->getId()){?>selected="true"<?php } ?>><?php echo $contentArea->getId()?> </option>
                        <?php endforeach;?>


                    </select>


                    <label class="col-sm-2 control-label" title="Set the article to be viewed on all pages">All Page
                        <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="all_page"   class="form-control" />
                        </div></label>
                    <label class="col-sm-2 control-label" title="Inactive articles can only be seen by the author.">Inactive
                        <div class="col-sm-10"><input oninput="resetBut()" type="checkbox" name="a_inactive"  class="form-control"   />
                        </div></label>
                    <input type="hidden" name = "formSubmitNewArticleConfirm" value="true" required/>


                    <div class="col-sm-12" ><span  class="btn btn-default  form-control"   id="formConfirm" onclick="verifyf()"; >Verify </span></div>
                    <div class="col-sm-12"><input type="submit" class="btn btn-default form-control"   id="addNewArticle" onclick="verifyf();resetBut(); " value ="Submit" />
                    </div>
                </form>



            <script>
                $('.collapse').collapse();
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
        </div>

    <?php
    }// end show ffomr


} // end class