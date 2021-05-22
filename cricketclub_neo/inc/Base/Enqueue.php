<?php

/**
 * Name Enqueue File Page
 * @package cricketclub_neo
 */

namespace Inc\Base;
use Inc\Base\BaseController;


class Enqueue extends BaseController{

    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'Enqueue']);
        add_action('wp_enqueue_scripts', [$this, 'Enqueue']);
    }

    //Enqueue Style/Scripts
    public function Enqueue()
    {

        wp_register_style('customstyle', $this->plugin_url . '/assets/custom_cricket_club_style.css', [], filemtime( $this->plugin_path . '/assets/custom_cricket_club_style.css'), 'all');
        wp_enqueue_style('customstyle');

        wp_register_script('customscript', $this->plugin_url . '/assets/custom_cricket_club_script.js', [], filemtime( $this->plugin_path . '/assets/custom_cricket_club_script.js'), true);
        wp_enqueue_script('customscript');
    }
    
}
