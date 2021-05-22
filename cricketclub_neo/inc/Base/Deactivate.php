<?php
/**
 * Name Plugin Deactivation file
 * @package cricketclub_neo
 */

 namespace Inc\Base;


 class Deactivate{

     public static function deactivate(){
         flush_rewrite_rules();
     }
 }