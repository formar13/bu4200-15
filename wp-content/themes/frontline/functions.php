<?php

// Skjuler adminbar
show_admin_bar(false);

// Theme setup
add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    } endif;

// Bootstrap og JQuery
function wpt_register_js() {
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );
function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

// JQuery i footer
function add_jQuery() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'add_jQuery');

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

// Lager widget area
function frontline_child_widgets_init() {
    register_sidebar( array(
            'name' => 'Forside Widgetarea',
            'id' => 'forside_widgetarea',
            'before_widget' => '<div class="col-sm-3 col-xs-12" ><div class="panel panel-default"><div class="panel-body">',
            'after_widget' => '</div></div></div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
}

function frontline_widgets_sosiale_medier_init() {
    register_sidebar( array(
        'name' => 'Sosiale Medier Widgetarea',
        'id' => 'sosiale_medier_widgetarea',
        'before_widget' => '<div class="col-sm-3 col-xs-12 pull-right" ><div class="panel panel-default"><div class="panel-body">',
        'after_widget' => '</div></div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'frontline_child_widgets_init');
add_action('widgets_init', 'frontline_widgets_sosiale_medier_init');

?>