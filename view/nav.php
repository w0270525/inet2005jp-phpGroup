<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
     <?php   foreach ($navArray as $page): ?>
        <ul class="nav navbar-nav">
         <li <?php if($currentPage->getId()==$page->getId()){?>class="active"<?php } ?>> <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page->getId(); ?>"><?php echo $page->getName() ?> <span class="sr-only">(current)</span></a></li>

<?php
endforeach;?>

    </div><!-- /.container-fluid -->
</nav>