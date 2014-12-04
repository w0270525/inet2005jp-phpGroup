
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
<h1>Add new Article</h1>
<table class="table">
    <thead>
    <tr>
        <th>Content Area</th>
        <th>Name</th>
        <th>Title</th>
        <th>Description</th>
        <th>Blurb</th>
        <th>Content</th>
        <th>Associated Page</th>
    </tr>
    </thead>
    <form name="addNewArticleForm"  id="addNewArticleForm" class="addNewArticleForm"
          action="#" method="post"  >
        <tbody>
        <tr>
            <td><input oninput="resetBtnArtForm()" type="text" name="a_contentarea" required /></td>
            <td><input oninput="resetBtnArtForm()" type="text" name="a_name" required /></td>
            <td><input oninput="resetBtnArtForm()" type="text" name="a_title" required /></td>
            <td><input oninput="resetBtnArtForm()" type="text" name="a_desc" required /></td>
            <td><input oninput="resetBtnArtForm()" type="text" name="a_blurb" required /></td>


            // TinyMCE WOULD GO HERE!
            <td><input oninput="resetBtnArtForm()" type="text" name="a_content" required /></td>
            // TinyMCE WOULD GO HERE!


            <td><input oninput="resetBtnArtForm()" type="text" name="a_assocpage" required /></td>
            <input type="hidden" name="formSubmitNewArticle" value="true" required/>
            <td>
                <div class="btn btn-default" id="formAddArticleConfirm" onclick="verifyFormSubmiotArticle()" >Verify</div>
                <input type="submit" class="btn btn-default" id="addArticleSubmitVerified" onclick="verifyFormSubmiotArticle();resetBtnArtForm();" value="Confirm" />
            </td>



        </tr>

        </tbody></form>

</table>

<script>
    alert("");
    $('#formAddArticleConfirm').hide();
    function  verifyFormSubmiotArticle()
    {
        if   (document.forms['addNewArticleForm']['a_title'].value.length>5)
            if (document.forms['addNewaddNewArticleFormArticle']['a_name'].value.length>5)
                if   (document.forms['addNewArticleForm']['a_alias'].value.length>5)
                    if( document.forms['addNewArticleForm']['a_desc'].value.length>20)
                    {
                        $('#formAddNewArticleConfirm').hide();
                        $('#addArticleSubmitVerified').show();
                    }
    }




    function resetBtnArtForm()
    {
        $('#formAddNewArticleConfirm').show();
        $('#addArticleSubmitVerified').hide();
    }
</script>