<?php
    $picurl=$_GET['picurl'];
    $img=$_GET['img'];
    
    unlink($img);
    file_put_contents($img, file_get_contents($picurl));
?>