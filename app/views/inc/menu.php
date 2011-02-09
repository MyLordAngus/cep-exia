
    
<div id="menu">
    <ul>
    <?php
        foreach($menu as $key=>$value){
            if($key!=0)
                echo '<li class="separateur">|</li>';
            echo '<li><a href="'.URL_BASE.'index.php'.$value['lien'].'">'.$value['libelle'].'</a></li>';
        }
    ?>
    </ul>
</div>
