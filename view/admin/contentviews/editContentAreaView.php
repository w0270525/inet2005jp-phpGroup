<?php if($_SESSION["logged"]==true):?>
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

    $content = $arrayOfContentAreas[0] ;

    ?>

    <h1>Edit  Content Area</h1>


    <div>
        <form name="editContentArea"  id="editContentArea" class="editContentArea" onclick ="//$('#addPageSubmit').hide();$('#verifyf').show()"          action="#" method="post">



            <label class="col-sm-2 control-label">Content Area Name</label>
            <div class="col-sm-10">
                   <input oninput="resetBut()" type="text" name = "c_name"  value = <?php echo $content->getName()?> class="form-control"required /></div>

            <label class="col-sm-2 control-label">Content Sre Alias</label>
                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_alias"  value = <?php echo $content->getAlias()?>  class="form-control"  required/></div>
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_desc"   class="form-control"required/></div>
            <label class="col-sm-2 control-label">Order</label>

            <div class="col-sm-10"><input oninput="resetBut()" type="text"  value = <?php echo $content->getOrder()?>   name="c_order" value="null" /></div>

            <div class="hidden"><input oninput="resetBut()" type="text"  value = <?php echo $content->getId()?>   name="c_order" value="null" /></div>

            <div class="col-sm-10"> <input type="hidden" name = "formSubmitNewContentArea" value="true"  /></div>


            <div  class="btn btn-default" id="formConfirmEditContentArea" onclick="verifyAddArticle()"    class="form-control">Verify </div>
            <input type="submit" class="btn btn-default" id="edeitContentAreaSubmitForm" onclick="verifyAddArticle();resetBut(); " value ="Confirm"   class="form-control" />


        </form>
    </div>
<?php

 ?>
        <script>
            function  verifyAddArticle()
            {
                if (document->forms['addNewContentArea']['c_name'].value.length>5)
                    if(document.forms['addNewContentArea']['c_alias'].value.length>5)
                        if( document.forms['addNewContentArea']['c_desc'].value.length>20)
                        {
                            $('#formConfirmAddNewContentArea').hide();
                            $('#addContentAreaSubmitForm').show();

                        }
            }


            $('#addContentAreaSubmitForm').hide();

            function resetBut()
            {
                $('#formConfirmAddNewContentArea').show();
                $('#addContentAreaSubmitForm').hide();
            }
        </script>


<?php
endif;
