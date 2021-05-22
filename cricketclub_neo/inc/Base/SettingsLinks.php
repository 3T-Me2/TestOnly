<?php

/**
 * Name SettingsLinks File Page
 * @package cricketclub_neo
 */

namespace Inc\Base;
use Inc\Base\BaseController;


class SettingsLinks extends BaseController{

    public function register(){
        add_filter( "plugin_action_links_". $this->plugin_base , [$this , 'settings_linksCB']);
    }

    public function settings_linksCB( $links ){
        
        $settings_link = '<a href="admin.php?page=cricket_club_page">Settings</a>';
        array_push($links, $settings_link);
        return $links;

    }
}
