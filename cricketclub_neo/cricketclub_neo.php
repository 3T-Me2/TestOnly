<?php
/**
 * Name Plugin Main Page
 * @package cricketclub_neo
 */


/*
    Plugin Name:       cricketclub_neo
    Plugin URI:        http://mysizzlers.co.uk
    Description:       This is first attempt on writting a custom plugin.
    Version:           1.0.0
    Requires at least: 5.2
    Requires PHP:      7.2
    Author:            Team-CodenCode
    Author URI:        http://mysizzlers.co.uk/author
    License:           GPL v2 or later
    License URI:       http://mysizzlers.co.uk/license
    Text Domain:       td_cricketclub_neo
 */

 /*
    cricketclub_neo is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.
    
    cricketclub_neo is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with cricketclub_neo. If not, see http://mysizzlers.co.uk/license.
 */

 
 //For Security Check
 defined ('ABSPATH') or die ('You Have No right to edit this plugin');

 if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
     require_once dirname(__FILE__) . '/vendor/autoload.php';
 }


//Activate
function Activate_cricketclub_neo(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'Activate_cricketclub_neo');


//Deactivate
function Deactivate_cricketclub_neo(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'Deactivate_cricketclub_neo');


 // Everything use in this file via Init - register_servicess
 if(class_exists('Inc\\Init')){
    Inc\Init::register_servicess();
 }