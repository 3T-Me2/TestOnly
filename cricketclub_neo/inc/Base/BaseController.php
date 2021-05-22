<?php

/**
 * Name Base Control file
 * @package cricketclub_neo
 */

namespace Inc\Base;

class BaseController
{

    public $plugin_path;
    public $plugin_url;
    public $plugin_base;

    public $managers = array();

    public function __construct()
    {

        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_base = plugin_basename(dirname(__FILE__, 3)) . '/cricketclub_neo.php';

        $this->managers = array(
            'cpt_manager' => 'Activate CPT Manager',
            'taxonomy_manager' => 'Activate Texonomy Manager',
        );
    }


    public function Activated_cpt( string $key )
    {
        $option = get_option( 'cricket_club_page' );
        return isset( $option[ $key ]) ? $option[ $key ] : false;
    }
}
