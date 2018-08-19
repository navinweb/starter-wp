<?php
/**
 * Comments.
 */

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status()
{
    return false;
}
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
add_filter('comments_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments)
{
    $comments = array();

    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');

function remove_dashboard_meta()
{
    remove_action('welcome_panel', 'wp_welcome_panel');
    //Remove the 'incoming links' widget
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    //Remove the 'plugins' widget
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    //Remove the 'WordPress News' widget
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    //Remove the secondary widget
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    //Remove the 'Quick Draft' widget
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    //Remove the 'Recent Drafts' widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    //Remove the 'Activity' widget
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    //Remove the 'At a Glance' widget
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    //Remove the 'Activity' widget (since 3.8)
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    //Remove Try Gutenberg Dashboard Panel
    remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );

}
add_action('admin_init', 'remove_dashboard_meta');

function tkb_remove_wp_admin_bar_links()
{
    remove_action('admin_bar_menu', 'wp_admin_bar_wp_menu');
}
add_action('add_admin_bar_menus', 'tkb_remove_wp_admin_bar_links');

function my_footer_shh()
{
    remove_filter('update_footer', 'core_update_footer');
}
add_action('admin_menu', 'my_footer_shh');

function edit_admin_menus()
{
    global $menu;
    global $submenu;

    //Posts to Blog
    $menu[5][0] = 'Blog';

    //Media to Uploads
    $menu[10][0] = 'Uploads';
    echo '';
}
add_action('admin_menu', 'edit_admin_menus');

function custom_admin_title($admin_title, $title)
{
    return $title . ' &bull; ' . get_bloginfo('name');
}
add_filter('admin_title', 'custom_admin_title', 10, 2);

/**
 * @TODO
 * Change email
 */
function nicewp_sender_email($original_email_address)
{
    return 'test@gmail.com';
}

function nicewp_sender_name($original_email_from)
{
    return 'NiceWP';
}
add_filter('wp_mail_from', 'nicewp_sender_email');
add_filter('wp_mail_from_name', 'nicewp_sender_name');


function nicewp_remove_help($old_help, $screen_id, $screen)
{
    $screen->remove_help_tabs();

    return $old_help;
}
add_filter('contextual_help', 'nicewp_remove_help', 999, 3);
add_filter('contextual_help', 'nicewp_remove_help', 999, 3);

remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');

remove_action('wp_head', 'wp_generator');
remove_action('rss2_head', 'the_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
