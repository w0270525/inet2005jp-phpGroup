
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

<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#newcontentaqdd">  Add  A New  Content Area </button>
<div id="newcontentaqdd" class="collapse in">

    <form name="addNewContentArea"  id="addNewContentArea" class="addNewContentArea"           action="#" method="post">

            <label class="col-sm-2 control-label">Content Area Name</label>
                <div class="col-sm-10"><input onkeyup="resetBut()" type="text" name = "c_name"   class="form-control"required /></div>
            <label class="col-sm-2 control-label">Content Sre Alias</label>
                <div class="col-sm-10"><input onkeyup="resetBut()" type="text" name = "c_alias"   class="form-control"required/></div>
            <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10"><input onkeyup="resetBut()" type="text" name = "c_desc"   class="form-control"required/></div>
            <label class="col-sm-2 control-label">Order</label>

               <div class="col-sm-10"> <input onkeyup="resetBut()" type="int" name = "c_order" value="1" /></div>


            <div class="col-sm-10"> <input type="hidden" name = "formSubmitNewContentArea" value="true"  /></div>


             <div  class="btn btn-default form-control" id="formConfirmAddNewContentArea" onclick="verifyAddArticle()"    class="form-control">Verify </div>
             <input type="submit" class="btn btn-default form-control" id="addContentAreaSubmitForm" onclick="verifyAddArticle();resetBut(); " value ="Confirm"   class="form-control" />

    </form>
<!-- close bootstrap hiding div -->
</div>

<script>
    function  verifyAddArticle()
    {
        if (document.forms['addNewContentArea']['c_name'].value.length>5)

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

