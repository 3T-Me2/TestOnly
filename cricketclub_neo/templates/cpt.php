<div class="wrap">
    <h1>CPT Manager</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Dashboard for Custom Post Types</a></li>
        <li><a href="#tab-2">Add Custom Post Types</a></li>
        <li><a href="#tab-3">Export</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <h3>Manage for Custom Post Types</h3>

        <?php

            //if Statement

        // if (  ! get_option( 'cricket_club_page_cpt' )) {
        //     $options =array();
        // }else{
        //     $options = get_option( 'cricket_club_page_cpt' );
        // }

            //if Statement (Short)
        //$options = ! get_option( 'cricket_club_page_cpt' ) ? array() : get_option( 'cricket_club_page_cpt' );

            //if Statement (More Short)
        $options = get_option( 'cricket_club_page_cpt' ) ?: array();


        echo '<table><tr><th>ID</th><th>Singuler Name</th><th>Plural Name</th><th>Public</th><th>Archive</th></tr>';

		foreach ($options as $option){

            $public = isset($option['public']) ? "TRUE" : "FALSE";
            $archive = isset($option['has_archive']) ? "TRUE" : "FALSE";

            echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}
            </td><td>{$public}</td><td>{$archive}</td></tr>";
        }

        echo '</table>';
        ?>

        </div>

        <div id="tab-2" class="tab-pane">

            <form method="post" action="options.php">
                <?php
                settings_fields('cricketclub_plugin_cpt_settings');
                do_settings_sections('cricket_club_cpt_page');
                submit_button();
                ?>
            </form>
        </div>

        <div id="tab-3" class="tab-pane">
            <h3>Export for Custom Post Types</h3>
        </div>
    </div>


</div>