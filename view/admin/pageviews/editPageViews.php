
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
foreach($arrayOfPages as $page):
?>

<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Edit Page <?php echo $page->getName(); ?></button>
<div id="demo" class="collapse in">
<table class="table">
    <thead>
    <tr>

        <th>Name</th>
        <th>Alias</th>
        <th>Description</th>
        <th>Created By</th>

        <th>Styles</th>
    </tr>
    </thead>
    <tbody>
    <?php


        ?>

        <tr>

            <td><?php echo $page->getName(); ?></td>
            <td><?php echo $page->getAlias(); ?></td>
            <td><?php echo $page->getDesc(); ?></td>
            <td><?php echo $page->getCreatedBy(); ?></td>
            <td><pre><?php echo $page->getStyle(); ?></pre></td>
            <td></td>

        </tr>

        <tr>
        <form name="addNewPageForm"  id="addNewPageForm" class="addNewPageForm" onclick ="$('#addPageSubmit').hide();$('#verifyf').show()"
              action="#" method="post" value="addNewPageForm">
            <tbody>



            <tr>

                <td><input oninput="resetBut()" type="text" name = "p_name" required /></td>
                <td><input oninput="resetBut()" type="text" name = "p_alias" required/></td>
                <td><input oninput="resetBut()" type="text" name = "p_desc" required/></td>
                <input type="hidden" name = "formSubmitNewPage" value="true" required/>
                <td><span  class="btn btn-default" id="formConfirm" onclick="verifyf()" >Verify </span>
                    <input type="submit" class="btn btn-default" id="addPageSubmit" onclick="verifyf();resetBut(); " value ="Confirm" >  </td>

            </tr>
            <tr>

                <td></td>
            </tr>



            </tbody></form>
        <tfoot></tfoot>
</table>
    </div>
<?php
endforeach;
?>

<script>
    function  verifyf()
    {
//        if (document.forms['addNewPageForm']['p_name'].value.length>5)
//      if   (document.forms['addNewPageForm']['p_alias'].value.length>5)
//        if( document.forms['addNewPageForm']['p_desc'].value.length>20)
//    {
        $('#formConfirm').hide();
        $('#addPageSubmit').show();
    }


    $('#addPageSubmit').hide()

    function resetBut()
    {
        $('#formConfirm').show();
        $('#addPageSubmit').hide();
    }
</script>