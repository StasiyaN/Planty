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




function add_admin_link_to_primary_menu( $items, $args ) {
    // Check if user is logged in and if the current menu is the Primary Menu
    if ( is_user_logged_in() && 'primary' === $args->theme_location ) {
        // Define the new menu item - an Admin link
        $admin_link = '<li class="menu-item menu-link"><a href="' . admin_url() . '">Admin</a></li>';
        
        // Append the new item to the existing menu items
        $items .= $admin_link;
    }
    
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_admin_link_to_primary_menu', 100, 2 );
