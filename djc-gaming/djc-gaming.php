<?php
/*
Plugin Name: DJC Gaming
Description: Hub voor educatieve en competitieve games van DJC-Nederland.
Version: 1.0.0
Author: DJC-Nederland
Text Domain: djc-gaming
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'DJC_GAMING_PATH', plugin_dir_path( __FILE__ ) );
define( 'DJC_GAMING_URL', plugin_dir_url( __FILE__ ) );

djc_gaming_load();

function djc_gaming_load() {
    require_once DJC_GAMING_PATH . 'includes/class-djc-registry.php';
    require_once DJC_GAMING_PATH . 'includes/shortcode-gaming.php';
    // Hier kunnen extra includes komen
}

// Automatische pagina aanmaken bij activatie
register_activation_hook( __FILE__, 'djc_gaming_activate' );
function djc_gaming_activate() {
    // Check of pagina bestaat
    $page = get_page_by_path( 'djc-gaming' );
    if ( ! $page ) {
        wp_insert_post([
            'post_title'   => 'DJC-Gaming',
            'post_name'    => 'djc-gaming',
            'post_content' => '[djc_gaming]',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ]);
    }
}
