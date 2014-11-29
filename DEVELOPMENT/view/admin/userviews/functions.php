<?php

function tableGlyphs($bool){
if($bool) echo '<span class="glyphicon glyphicon-ok"></span>';
else echo '<span class="glyphicon glyphicon-ban-circle" style="color:red";></span>';
}