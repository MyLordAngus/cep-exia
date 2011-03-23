<?php
    if(!isset($messages))
        $messages = array();
?>
<!--<div id="breadcrumb" class="grid_16">
    <?php //echo create_breadcrumb();?>
</div>-->
<div id="messages">
    <?php
    foreach ($messages as $type => $message)
        echo '<p class="'.$type.'">'.$message.'</p>';

    if(isset($_SESSION['error'])){
        echo '<p class="error">'.$_SESSION['error'].'</p>';
        unset ($_SESSION['error']);
    }
    ?>
</div>
