<?php

/**
 * Name Custom Post Type File Page
 * @package cricketclub_neo
 */

namespace Inc\Base;
use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;


class TaxonomyController extends BaseController{
    public $settings;
    public $callbacks;

    public $subpages = array();




    public function register()
    {

        if(! $this->Activated_cpt('taxonomy_manager')){
            return;
        }


        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();


        //add_action( 'init',array($this, 'activate') );

    }

    public function setSubPages(){
        $this->subpages = array(
            array(
                'parent_slug' => 'cricket_club_page',
                'page_title' => 'custom_texonomy_type',
                'menu_title' => 'Texonomy Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'cricket_club_texonomy_page',
                'callback' => array($this->callbacks, 'adminDashboard_taxonomy'),
            )
        );
    }

    // public function activate(){
    //     register_post_type( 'my_products', array(
    //         'labels' => array(
    //             'name' => 'Products',
    //             'singular_name' => 'Product',
    //         ),
    //         'public' => true,
    //         'has_archive' => true
    //     ) );
    // }
}