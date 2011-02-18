<?php
    if(!isset($messages))
        $messages = array();
?>
<div id="messages">
    <?php
    foreach ($messages as $type => $message)
        echo '<p class="'.$type.'">'.$message.'</p>';

    if(isset($_SESSION['error'])){
        foreach ($_SESSION['error'] as $error) {
            echo '<p class="error">'.$error.'</p>';
        }
        unset ($_SESSION['error']);
    }
    ?>
</div>
