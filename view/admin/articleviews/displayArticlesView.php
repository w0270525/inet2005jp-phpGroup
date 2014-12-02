
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
        <td>  Name </td>
        <td> Title </td>
        <td> Contentarea </td>
        <td> Content </td>
        <td> AssocPage </td>
        <td> AllPages </td>
        <td> Blurb </td>
        <td> Desc </td>

    </tr>

    <?php
    foreach($arrayOfArticles as $article):

        ?>
        <tr>
            <span id='articleId'><?php echo $article->getId(); ?></span>
            <td><?php echo $article->getName(); ?></td>
            <td><?php echo $article->getTitle(); ?></td>
            <td><?php echo $article->getContentarea(); ?></td>
            <td><?php echo $article->getContent(); ?></td>
            <td><?php echo $article->getAssocPage(); ?></td>
            <td><?php echo $article->getAllPages(); ?></td>
            <td><?php echo $article->getBlurb(); ?></td>
            <td><?php echo $article->getDesc(); ?></td>

            <td><a href="?articleupdate= <?php echo $article->getId() ; ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>

        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
</table>
