<?php

class contentForm{


public $content;
public $id;
PUBLIC  function __construct($uniqueId,$ca){
    $this->id= $uniqueId;
    $this->content = $ca;
}





          function showEditContentForm()
          {

              ?>

                  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#custombutton<?php echo $this->id ?>"  id="editcontentareaBSbutton<?php echo $this->id ?>"> Edit  Content Area   <?php echo $this->content->getName()?></button>
                    <div id="custombutton<?php echo $this->id ?>" class="collapse in">
                        <form name="editContentAreaForm<?php echo $this->id ?>"   id="editContentArea" class="editContentAreaForm" onclick ="//$('#addPageSubmit').hide();$('#verifyf').show()"          action="#" method="post">


                            <label class="col-sm-2 control-label">Content Area Name</label>
                            <div class="col-sm-10">
                                <input oninput="resetBut()" type="text" name = "c_name"  value =  <?php echo $this->content->getName()?> class="form-control" required /></div>

                            <label class="col-sm-2 control-label">Content Sre Alias</label>

                            <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_alias"  value = <?php echo $this->content->getAlias()?>  class="form-control"  required/></div>
                            <label class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_desc" value=<?php echo $this->content->getDesc() ?>  class="form-control"/></div>
                            <label class="col-sm-2 control-label">Order</label>

                            <div class="col-sm-10">
                                <input oninput="resetBut()" type="int"  value =<?php echo $this->content->getOrder()?>   name="c_order" /></div>


                            <!-- content area id for back end use -->
                            <input  type="hidden"  value =<?php echo $this->content->getId()?>   name="id" />


                            <div class="col-sm-10"> <input type="hidden" name = "formSubmitEditContentArea" value="true"   class="form-control"/></div>


                            <div  class="btn btn-default  " id="formConfirmEditContentArea<?php echo $this->id ?>"  onclick="verifyeditArticle<?php echo $this->id ?>()"  class="form-control" > Verify  </div>
                            <input  type="submit" class="btn btn-default" id="editContentAreaSubmitForm" onclick="verifyeditArticle<?php echo $this->id ?>();resetBut<?php echo $this->id ?> (); " value ="Confirm" />

                        </form>

                        <!-- close boot strap  div -->
                    </div>


                <script>



                    $('.collapse').collapse();
                    function  verifyeditArticle<?php echo $this->id ?>()
                    {
                        if (document.forms['editContentAreaForm<?php echo $this->id ?>']['c_name'].value.length>5)
                            if(document.forms['editContentAreaForm<?php echo $this->id ?> ']['c_alias'].value.length>5)
                                if( document.forms['editContentAreaForm<?php echo $this->id ?> ']['c_desc'].value.length>20)
                                {
                                    $('#formConfirmEditContentArea<?php echo $this->id ?>').hide();
                                    $('#editContentAreaSubmitForm<?php echo $this->id ?>' ).show();

                                }
                    }


                    $('custombutton<?php echo $this->id ?>').collapse(hide);


                    function resetBut()
                    {
                        $('#formConfirmEditContentArea<?php echo $this->id ?>' ).show();
                        $('#editContentAreaSubmitForm<?php echo $this->id ?>' ).hide();
                    }

                    $('#editContentAreaSubmitForm<?php echo $this->id ?>' ).hide();
                </script>


<?php
}// end show ffomr


} // end class