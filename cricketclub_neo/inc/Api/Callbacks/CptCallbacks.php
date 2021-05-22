<?php
/**
 * Name Function Control file for all manager
 * @package cricketclub_neo
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class CptCallbacks extends BaseController{


    public function cptSanitize( $input ){

        //return $input;

        $outputs = get_option('cricket_club_page_cpt');

        if(count($outputs)==0){
            $outputs[ $input['post_type']] = $input;
            return $outputs;
        }

         foreach ( $outputs as $key => $value ){
             if ( $input ['post_type'] === $key ){
                 $outputs[ $key ] = $input;
             }else{
                 $outputs[ $input['post_type']] = $input;
             }
         }

        return $outputs;

    }

    public function cptSectionManager(){
        echo 'Create for New Custom Post Type';
    }

    public function textFields($args){
        $name = $args["label_for"];
        $option = $args["option_name"];
        $input = get_option($option);
        $holder = $args["placeholder"];

        echo '<input type="text" class="regular-text" name="'.$option.'['.$name.']" id="'.$name.'" value="" placeholder="'.$holder.'" required>';
    }

    public function checkboxFields($args){

        $name = $args["label_for"];
        $classes = $args["class"];
        $option = $args["option_name"];
        $checkbox = get_option($option);

        
        echo '<div class= "'.$classes.'"><input type="checkbox" name="'.$option.'['.$name.']" id="'.$name.'" value="1" class="" ><label for="'.$name.'"><div></div></label></div>';
    }


 }
