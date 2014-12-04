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
?>
<h1>Add  A New  Content Area</h1>


<div>
    <form name="addNewContentArea"  id="addNewContentArea" class="addNewContentArea" onclick ="//$('#addPageSubmit').hide();$('#verifyf').show()"          action="#" method="post">



            <label class="col-sm-2 control-label">Content Area Name</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_name"   class="form-control"required /></div>
            <label class="col-sm-2 control-label">Content Sre Alias</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_alias"   class="form-control"required/></div>
            <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10"><input oninput="resetBut()" type="text" name = "c_desc"   class="form-control"required/></div>
            <label class="col-sm-2 control-label">Order</label>

                   <!--content order -- not sure if it can be impementred during the addition of a content area -->
                <div class="col-sm-10"><input oninput="resetBut()" type="hidden" name = "c_order" value="null" /></div>


            <div class="col-sm-10"> <input type="hidden" name = "formSubmitNewContentArea" value="true"  /></div>


             <div  class="btn btn-default" id="formConfirmAddNewContentArea" onclick="verifyAddArticle()"    class="form-control">Verify </div>
             <input type="submit" class="btn btn-default" id="addContentAreaSubmitForm" onclick="verifyAddArticle();resetBut(); " value ="Confirm"   class="form-control" />


</form>


<script>
    function  verifyAddArticle()
    {
        if (document.forms['addNewContentArea']['c_name'].value.length>5)
	        if ((/\s/.test(s)), document.forms['addNewContentArea']['c_alias'] )
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
    </div>

<?php
endif;
