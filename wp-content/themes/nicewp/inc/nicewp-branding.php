<?php

/**
 * Branding.
 */
function custom_login_styles()
{
    wp_enqueue_style('nicewp-login', get_stylesheet_directory_uri() . '/assets/css/admin/login.css');
}
add_action('login_enqueue_scripts', 'custom_login_styles');

function custom_login_logo_url()
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');

function custom_login_logo_url_title()
{
    return 'NiceWP';
}
add_filter('login_headertitle', 'custom_login_logo_url_title');

function remove_footer_admin()
{
    echo '';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function login_logo()
{
    echo '<style type="text/css">#wp-admin-bar-wp-logo{display: none !important;}</style>';
}
add_action('wp_before_admin_bar_render', 'login_logo');

wp_admin_css_color(
    'nicewp', 'nicewp',
    get_stylesheet_directory_uri() . "/assets/css/admin/colors.css"
);

function update_user_option_admin_color($color_scheme)
{
    $color_scheme = 'nicewp';
    return $color_scheme;
}
add_filter('get_user_option_admin_color', 'update_user_option_admin_color', 5);
