<?php
    if(!isset($messages))
        $messages = array();
?>
<div id="messages">
    <?php
    foreach ($messages as $type => $message)
        echo '<p class="'.$type.'">'.$message.'</p>';

    ?>
</div>
