<?php
/**
 * Plugin Name: Unadorned Announcement Bar
 */

function unadorned_announcement_bar_settings_page() {
    add_options_page(
        __( 'Unadorned Announcement Bar', 'unadorned-announcement-bar' ),
        __( 'Unadorned Announcement Bar', 'unadorned-announcement-bar' ),
        'manage_options',
        'unadorned-announcement-bar',
        'unadorned_announcement_bar_settings_page_html'
    );
}

add_action( 'admin_menu', 'unadorned_announcement_bar_settings_page' );

function unadorned_announcement_bar_settings_page_html() {
    printf(
        '<div class="wrap" id="unadorned-announcement-bar-settings">%s</div>',
        esc_html__( 'Loading…', 'unadorned-announcement-bar' )
    );
}

function unadorned_announcement_bar_settings_page_enqueue_style_script( $admin_page ) {
    if ( 'settings_page_unadorned-announcement-bar' !== $admin_page ) {
        return;
    }

    // $asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

    $asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

    if ( ! file_exists( $asset_file ) ) {
        return;
    }

    $asset = include $asset_file;

    wp_enqueue_script( 'unadorned-announcement-bar-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );

}

add_action( 'admin_enqueue_scripts', 'unadorned_announcement_bar_settings_page_enqueue_style_script' );