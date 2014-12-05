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

    foreach(  $arrayOfContentAreas  as $content):


        ?>

        <h1></h1>


<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#deletecontentarea_">Delete Content Area <?php echo $content->getName()?></button>
<div id="deletecontentarea_" class="collapse in">

            <form name="deleteContentAreaForm"  id="deleteContentAreaForm" class="deleteContentAreaForm" onclick ="//$('#addPageSubmit').hide();$('#verifyf').show()"          action="#" method="post">


                <label class="col-sm-2 control-label">Content Area Name</label>
                <div class="col-sm-10">
                    <input oninput="resetButStyleAdd()" type="text" name = "c_name"  value =  <?php echo $content->getName()?> class="form-control" required /></div>

                <label class="col-sm-2 control-label">Content Area Alias</label>

                <div class="col-sm-10">
                    <input oninput="resetButStyleAdd()" type="text" name = "c_alias"  value = <?php echo $content->getAlias()?>  class="form-control"  required/></div>

                <label class="col-sm-2 control-label">Content Area Description</label>
                <div class="col-sm-10">
                     <input oninput="resetButStyleAdd()" type="text" name = "c_desc" value=<?php echo $content->getDesc() ?>  class="form-control"/> </div>

                <label class="col-sm-2 control-label">Order</label>
                <div class="col-sm-10">
                    <input oninput="resetButStyleAdd()" type="int"  value =<?php echo $content->getOrder()?>   name="c_order" /></div>

                <!-- content area id for back end use -->
                <input  type="hidden"  value =<?php echo $content->getId()?>   name="id" />


                <div  > <input type="hidden" name = "formDelete" value="true"   class="form-control"/></div>




                <!-- content area id for back end use -->
                <input  type="hidden"  value ="<?php echo $content->getId()?>"   name="id" />
                <!-- USED FOR BACKEND FORM VERIFICATION -->
                <input type="hidden" name="deleteId" value="<?php echo $content->getId()?>" required/>


                <div class="col-sm-10"> <input type="hidden" name = "formDeleteContentArea" value="true"   class="form-control"/> </div>



                <span class="btn btn-warning form-control" id="formConfirm" onclick="ConfirmAction()" >Delete This Record</span>
                <input type="submit" class="btn btn-danger form-control" id="removeItem" onclick="resetButStyleAdd();resetButStyleAdd();" value="Action cannot be undone - Confirm Delete" />

            </form>
        </div>
    <?php
    endforeach;
    ?>

<script>
    function  ConfirmAction()
    {

        $('#formConfirm').hide();
        $('#removeItem').show();

    }


    $('#removeItem').hide()

    function resetButStyleAdd()
    {
        $('#formAddStyleConfirm').show();
        $('#removeItem').hide();
    }
</script>



<?php endif;