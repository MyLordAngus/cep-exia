<?php
/**
 * Description of menu_controller
 *
 * @author SuperBen
 */
class Menu {
    public static function get() {
        $session = get_instance()->session;
        $menu = new Menu_DB();
        if($session->userdata('isLoged')){
            if($session->userdata('type') == 'entreprise')
                $menu = $menu->getMenuByCode(array(2,4));
            else
                $menu = $menu->getMenuByCode(array(3,4));
        }
        else
            $menu = $menu->getMenuByCode(array(1));
        return $menu;
    }
   
}
