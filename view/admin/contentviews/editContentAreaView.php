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

    $content = $arrayOfContentAreas  ;

    ?>

    <h1>Edit  Content Area</h1>


    <div>
        <form name="editContentAreaForm"  id="editContentArea" class="editContentAreaForm" onclick ="//$('#addPageSubmit').hide();$('#verifyf').show()"          action="#" method="post">








            <label class="col-sm-2 control-label">Content Area Name</label>
            <div class="col-sm-10">
            <input oninput="resetBut()" type="text" name = "c_name"  value =  <?php echo $content->getName()?> class="form-control"required /></div>

            <label class="col-sm-2 control-label">Content Sre Alias</label>

                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_alias"  value = <?php echo $content->getAlias()?>  class="form-control"  required/></div>
            <label class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_desc" value=<?php echo $content->getDesc() ?>  class="form-control"required/></div>
            <label class="col-sm-2 control-label">Order</label>

            <div class="col-sm-10">
                    <input oninput="resetBut()" type="int"  value = <?php echo $content->getOrder()?>   name="c_order" /></div>



            <div class="col-sm-10"> <input type="hidden" name = "formSubmitEditContentArea" value="true"  /></div>


            <div  class="btn btn-default  " id="formConfirmEditContentArea" onclick="verifyeditArticle()" > Verify  </div>
           <input  type="submit" class="btn btn-default" id="editContentAreaSubmitForm" onclick="verifyeditArticle();resetBut(); " value ="Confirm" />

        </form>
    </div>
<?php

 ?>
        <script>

            function  verifyeditArticle()
            {
                if (document.forms['editContentAreaForm']['c_name'].value.length>5)
                    if(document.forms['editContentAreaForm']['c_alias'].value.length>5)
                        if( document.forms['editContentAreaForm']['c_desc'].value.length>20)
                        {
                            $('#formConfirmEditContentArea').hide();
                            $('#editContentAreaSubmitForm').show();

                        }
            }




            function resetBut()
            {
                $('#formConfirmEditContentArea').show();
                $('#editContentAreaSubmitForm').hide();
            }

            $('#editContentAreaSubmitForm').hide();
        </script>


<?php
endif;
