
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

<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#formArticleaddNewStyleForm">Add New Style</button>
<div id="formArticleaddNewStyleForm" class="collapse in">


<form name="addNewStyleForm" id="addNewStyleForm" class="addNewStyleForm" action="#" method="post" >
      <label>Name</label>
            <input oninput="verifyFormAddStylebtn()" type="text" name="s_name" class="form-control" required />

      <label>Description</label>
            <input oninput="verifyFormAddStylebtn()" type="text" name="s_desc" class="form-control" />

      <label>CSS</label>
            <textarea class="form-control" rows="13" oninput="verifyFormAddStylebtn()" type="text" name ="s_style" required >CSS ...</textarea>

      <!-- USED FOR BACKEND FORM VERIFICATION -->
      <input type="hidden" name="formSubmitNewStyle" value="true" required />


      <div class="btn btn-default" id="formAddStyleConfirmbtn" onclick="verifyFormAddStylebtn()">Verify</div>
      <input type="submit" class="btn btn-default" id="addStyleSubmitbtnbtn" onclick="verifyFormAddStylebtn();verifyFormAddStylebtn_add();" value="Confirm" />
</form>


</div>

<script>

    function  verifyFormAddStylebtn()
    {
        if (document.forms['addNewStyleForm']['s_name'].value.length>5)
            if ( document.forms['addNewStyleForm']['s_desc'].value.length>5)
                   // need to add MVC validation
                    {
                        $('#formAddStyleConfirmbtn').hide();
                        $('#addStyleSubmitbtnbtn').show();

                 }
    }


    $('#addStyleSubmitbtnbtn').hide();
    function verifyFormAddStylebtn_add()
    {
        $('#formAddStyleConfirmbtn').hide();
        $('#addStyleSubmitbtnbtn').show();
    }
</script>