
<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#deletePageFormBt">Delete A Page </button>
<div id="deletePageFormBt" class="collapse in">


<?php
if(!empty($lastOperationResults)):
    ?>
    <h2><?php echo $lastOperationResults; ?></h2>
<?php
endif;
$page=$arrayOfPagObjects[0];
?>
<<h1>Remove Page</h1>
<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Alias</th>
        <th>Description</th>
    </tr>
    </thead>
    <form name="updatePageForm"  id="updatePageForm" class="updatePageForm" action="#" method="post" >
        <tbody>
        <tr>
            <td><input oninput="resetBut()" type="text" name ="p_name" value="<?php echo $page->getName(); ?>"  /></td>
            <td><input oninput="resetBut()" type="text" name ="p_alias" value="<?php echo $page->getAlias(); ?>"  /></td>
            <td><input oninput="resetBut()" type="text" name ="p_desc" value="<?php echo $page->getDesc(); ?>"  /></td>

            <td><input type="hidden" name ="id" value="<?php echo $page->getId(); ?>"  /></td>

            <input type="hidden" name = "formSubmitDeletePage" value="true" required />


            <td><span class="btn btn-warning form-control" id="formConfirm" onclick="verifydeletepagef()" >Verify</span>
                <input type="submit" class="btn btn-danger form-control" id="DeletePageSubmit" onclick="resetBut();" value="Confirm" /></td>
        </tr>
        </tbody>
    </form>
    <tfoot></tfoot>
</table>

<script>
    function  verifydeletepagef()
    {

        $('#formConfirm').hide();
        $('#DeletePageSubmit').show();
    }


    $('#DeletePageSubmit').hide()

    function resetBut()
    {
        $('#formConfirm').show();
        $('#DeletePageSubmit').hide();
    }
</script>

</div>