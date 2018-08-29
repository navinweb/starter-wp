<?php
if (!function_exists('nicewp_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function nicewp_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on nicewp, use a find and replace
         * to change 'nicewp' to the name of your theme in all the template files.
         */
        load_theme_textdomain('nicewp', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'nicewp'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
endif;
add_action('after_setup_theme', 'nicewp_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nicewp_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('nicewp_content_width', 640);
}
add_action('after_setup_theme', 'nicewp_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nicewp_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'nicewp'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'nicewp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'nicewp_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function nicewp_scripts()
{
    wp_enqueue_style('nicewp-style', get_stylesheet_uri());

    // wp_enqueue_script( 'file', get_template_directory_uri() . '/js/file.js', array(), WP_VERSION, true );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nicewp_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/nicewp-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/nicewp-header.php';

/**
 * Functions which disable excess WordPress stuff.
 */
require get_template_directory() . '/inc/nicewp-disable.php';

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
