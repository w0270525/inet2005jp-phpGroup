
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
<h1>Site Styles</h1>

<table class="table">
    <thead>
    <tr>

        <th>Name</th>
        <th>Alias</th>
        <th>Description</th>
        <th>Created By</th>
        <th>Created Date</th>
        <th>Modified By</th>
        <th>Modified Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($arrayOfStyles as $style):

        ?>
        <tr>

            <td><?php echo $style->getName(); ?></td>
            <td><?php echo $style->getDesc(); ?></td>
            <td><?php echo $style->getStyle(); ?></td>

            <td><?php echo $style->getCreatedBy(); ?></td>
            <td><?php echo $style->getCreatedDate(); ?></td>
            <td><?php echo $style->getModifiedBy(); ?></td>
            <td><?php echo $style->getModifiedDate(); ?></td>
            <td><?php if($style->getActive()):
                    ?><span class="glyphicon glyphicon-check"></span><?php
                else: ?><span class="glyphicon  glyphicon-stop"></span>
                <?php
                endif; ?>

                </td>
            <td><span class="glyphicon glyphicon-pencil" ><a href="?styleupdate=<?php echo $style->getId() ; ?>"></a></span></td>

        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
