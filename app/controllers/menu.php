<?php
/**
 * Description of menu_controller
 *
 * @author SuperBen
 */
class Menu {
    public static function get() {
        $menu = new Menu_DB();
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            if($user->getClassName() == 'Entreprise')
                $menu = $menu->getMenuByCode(array(2,4));
            else
                $menu = $menu->getMenuByCode(array(3,4));
        }
        else
            $menu = $menu->getMenuByCode(array(1));
        return $menu;
    }
   
}
