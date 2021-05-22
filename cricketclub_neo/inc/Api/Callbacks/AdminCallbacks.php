<?php
/**
 * Name Function Control file
 * @package cricketclub_neo
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{

    public function adminDashboard(){
        require_once ($this->plugin_path . '/templates/admin.php');
    }

    public function adminDashboard_cpt(){
        require_once ($this->plugin_path . '/templates/cpt.php');
    }

    public function adminDashboard_taxonomy(){
        echo "<h1>Hello How Are You Taxonomy ?</h1>";
    }

    // public function registerOptionCB($input){
    //     return $input;
    // }

    // public function registerSectionsCB(){
    //     echo '<h4>write and check your settings</h4>';
    // }

    // public function registerFieldsCB(){
    //     $value = esc_attr(get_option( 'for_test' ));
    //     echo '<input type="text" class="regular-text" name="for_test" value="'.$value.'" placeholder="write Something Here" />';
    // }

    // public function registerFieldsCB_fName(){
    //     $f_name = esc_attr(get_option( 'first_name' ));
    //     echo '<input type="text" class="regular-text" name="first_name" value="'.$f_name.'" placeholder="write Your First Name" />';
    // }

 }
