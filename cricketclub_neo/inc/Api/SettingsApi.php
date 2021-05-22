<?php

/**
 * Name SettingsApi File Page
 * @package cricketclub_neo
 */

namespace Inc\Api;


class SettingsApi{

    public $admin_pages = array();
    public $admin_subpages = array();

    public $settings = array();
    public $sections = array();
    public $fields = array();

    public function register(){
        if(! empty( $this->admin_pages ) || !empty($this->admin_subpages) ){
            add_action( 'admin_menu',[$this , 'addAdminMenuPages'] );
        }

        if(!empty($this->settings)){
            add_action( 'admin_init', array( $this, 'registerCustomFields') );
        }
    }

    public function addPages( array $pages){
        $this->admin_pages = $pages;
        return $this;
    }

    public function withSubpage(string $title = null){
        if( empty( $this->admin_pages ) ){
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $subpage = array(
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            )
        );

        $this->admin_subpages = $subpage;
        return $this;
    }

    public function addSubPages( array $pages ){

        $this->admin_subpages = array_merge( $this->admin_subpages, $pages );
        return $this;

    }

    public function addAdminMenuPages(){

        foreach($this->admin_pages as $page){
            add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
        }

        foreach($this->admin_subpages as $page){
            add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
        }
    }

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                Adding Custom Fields In Admin Page
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


    //setter Method For register settings
    public function setSettings(array $r_settings){
            $this->settings = $r_settings;
            return $this;
    }
    //setter Method For sections
    public function setSections(array $sections){
        $this->sections = $sections;
        return $this;
    }
    //setter Method For fields
    public function setFields(array $fields){
        $this->fields = $fields;
        return $this;
    }


    public function registerCustomFields(){
        // register settings
        foreach($this->settings as $setting){
        register_setting( $setting['option_group'], $setting['option_name'], (isset($setting['callback']) ? $setting['callback'] : ''));
        }

        // add sections

        foreach($this->sections as $section){
            add_settings_section( $section['id'], $section['title'], (isset($section['callback']) ? $section['callback'] : ''), $section['page'] );
            }

        //add fields

        foreach($this->fields as $field){
            add_settings_field( $field['id'], $field['title'], (isset($field['callback']) ? $field['callback'] : ''), $field['page'], $field['section_id'], (isset($field['args']) ? $field['args'] : ''));
            }
    }

}