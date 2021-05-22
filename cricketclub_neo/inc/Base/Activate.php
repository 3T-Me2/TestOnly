<?php

/**
 * Name Plugin Activation file
 * @package cricketclub_neo
 */

namespace Inc\Base;


class Activate
{

    public static function activate()
    {
        flush_rewrite_rules();

        // if (get_option('cricket_club_page')) {
        //     return;
        // }

        $default = array();
        // update_option('cricket_club_page', $default);

        if ( ! get_option( 'cricket_club_page')) {
            update_option( 'cricket_club_page', $default);
        }

        if (  ! get_option( 'cricket_club_page_cpt' )) {
            update_option( 'cricket_club_page_cpt', $default);
        }
    }
}
