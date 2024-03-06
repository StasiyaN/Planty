<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(),
    filemtime(get_stylesheet_directory() . '/css/theme.css'));
    wp_enqueue_style ('fonts', 'https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap');
}



/*  ADMIN */


add_filter( 'wp_nav_menu_items', 'add_admin_link_to_menus', 10, 2 );

function add_admin_link_to_menus( $items, $args ) {
    if ( is_user_logged_in() && ( 'primary' == $args->theme_location || 'off_canvas' == $args->theme_location ) ) {
        $admin_link = '<li class="menu-item admin-link"><a href="' . admin_url() . '">Admin</a></li>';
        $items .= $admin_link;
    }
    return $items;
}





