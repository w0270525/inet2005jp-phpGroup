<?php
// author link to edit styles
    ?>
    <?php
    $arrayOfStyles[] = $currentPage->getStyle();
    include "admin/styleviews/editStyleView.php";
    ?>
    <script>
        $('#styleeditidbsbutton').click();
    </script>
</div>


