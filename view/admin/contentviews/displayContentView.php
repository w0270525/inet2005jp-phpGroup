
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
<h1>Site Articles</h1>

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
    foreach($arrayOfContentAreas as $content):

        ?>
        <tr>
            <span id='articleId'><?php echo $content->getId(); ?></span>
            <td><?php echo $content->getName(); ?></td>
            <td><?php echo $content->getAlias(); ?></td>


            <td><?php foreach ($content->getArticles() as $article)
                    echo $article." ";
                echo $content->getAssocPage(); ?></td>


            <td><?php echo $content->getDesc(); ?></td>
            <td><?php echo $content->getCreatedBy(); ?></td>
            <td><?php echo $content->getCreatedDate(); ?></td>
            <td><?php echo $content->getModifiedBy(); ?></td>
            <td><?php echo $content->getModifiedDate(); ?></td>
            <td><a href="?pageupdate= <?php echo $content->getId() ; ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>

        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
