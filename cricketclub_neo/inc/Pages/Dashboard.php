<?php

/**
 * Name Dashboard Menu Pages
 * @package cricketclub_neo
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;


class Dashboard extends BaseController{

    public $settings;
    public $callbacks;
    public $mngr_callbacks;
    public $pages = array();
    //public $subpages = array();

    public function register(){
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->mngr_callbacks = new ManagerCallbacks();

        $this->setPages();
        //$this->setSubPages();

        $this->rSetSettings();
        $this->rSetSections();
        $this->rSetFields();

        $this->settings->addPages($this->pages)->withSubpage('Dashboard')->register();
        
    } 

    public function setPages(){
        $this->pages = array(
            array(
                'page_title' => 'Neo-Cricket-Club',
                'menu_title' => 'Cricket Club',
                'capability' => 'manage_options',
                'menu_slug' => 'cricket_club_page',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-screenoptions',
                'position' => 110,
            )
        );
    }

    // public function setSubPages(){
    //     $this->subpages = array(
    //         array(
    //             'parent_slug' => 'cricket_club_page',
    //             'page_title' => 'custom_post_type',
    //             'menu_title' => 'CPT Manager',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'cricket_club_cpt_page',
    //             'callback' => array($this->callbacks, 'adminDashboard_cpt'),
    //         ),
    //         array(
    //             'parent_slug' => 'cricket_club_page',
    //             'page_title' => 'custom_texonomy_type',
    //             'menu_title' => 'Texonomy Manager',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'cricket_club_texonomy_page',
    //             'callback' => array($this->callbacks, 'adminDashboard_taxonomy'),
    //         )
    //     );
    // }

    public function rSetSettings(){

        $args = array(
            array(
                'option_group' => 'cricketclub_plugin_settings',
                'option_name' => 'cricket_club_page',
                'callback' => array($this->mngr_callbacks, 'checkboxSanitize')
            )
        );


        $this->settings->setSettings( $args );
    }

    public function rSetSections(){
        $args = array(
            array(
                'id' => 'cricketclub_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->mngr_callbacks, 'cricketSectionManager'),
                'page' => 'cricket_club_page'
            )
        );

        $this->settings->setSections( $args );
    }

    public function rSetFields(){
        foreach( $this->managers as $key => $value ){
            $args[] = array(
            'id' => $key,
            'title' => $value,
            'callback' => array($this->mngr_callbacks, 'managerFieldsCB'),
            'page' => 'cricket_club_page',
            'section_id' => 'cricketclub_admin_index',
            'args' => array(
                'option_name'=> 'cricket_club_page',
                'label_for' => $key,
                'class' => 'ui-toggle'
            )
        );
    }

        $this->settings->setFields( $args );
    }
}