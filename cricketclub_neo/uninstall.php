<?php
/**
 * Trigger this file on plugin uninstall
 * @package cricketclub_neo
 */

 //For Security Check
 if(!defined('WP_UNINSTALL_PLUGIN')){
     die('You Have No right to uninstall/delete this plugin');
 }

 // To Clear DB stored data

    //Give access the DB via SQL
    global $wpdb;

    $wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
    $wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT id FROM wp_posts )");
    $wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN ( SELECT id FROM wp_posts )");