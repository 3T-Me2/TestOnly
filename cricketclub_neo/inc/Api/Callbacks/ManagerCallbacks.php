<?php
/**
 * Name Function Control file for all manager
 * @package cricketclub_neo
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController{

    
    public function checkboxSanitize($input){
        $output = array();
        foreach($this->managers as $key => $value){
            $output[$key] = isset($input[$key]) ? true : false;
        }
        return $output;
    }

    public function cricketSectionManager(){
        echo '<h4>write and check your settings</h4>';
    }

    public function managerFieldsCB($args){

        $name = $args["label_for"];
        $classes = $args["class"];
        $option = $args["option_name"];
        $checkbox = get_option($option);

        $check = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;
        
        echo '<div class= "'.$classes.'"><input type="checkbox" name="'.$option.'['.$name.']" id="'.$name.'" value="1" '. ($check ? 'checked' : '').'><label for="'.$name.'"><div></div></label></div>';
    }


 }
