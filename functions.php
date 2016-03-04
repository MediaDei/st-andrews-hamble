<?php 

// remove auto-loaded emoji scripts (Tyler)
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



/**
 * Set title based on current view.
 *
 * @since Twenty Twelve 1.0
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function extra_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'standrewshamble' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'extra_wp_title', 10, 2 );


#remove_action( 'wp_head', 'rsd_link' );


// Defaults
// ---remove GoogleFonts OpenSans font, 
// ---add default jquery
function scripts_styles() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    //wp_enqueue_script('jquery'); // default jQuery
    wp_enqueue_script('jquery-include', get_template_directory_uri() . '/js/jquery-1.11.3.min.js');
    wp_enqueue_script('mapbox', 'https://api.tiles.mapbox.com/mapbox.js/v2.2.0/mapbox.js');
}
add_action( 'wp_enqueue_scripts', 'scripts_styles');



?>