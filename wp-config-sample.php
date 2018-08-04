<?php

define('WP_MEMORY_LIMIT', '2048M');
define('WP_MAX_MEMORY_LIMIT', '3000M');

define('WP_DEBUG', false);

if ( WP_DEBUG ) {
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );

	define( 'SMTP_HOST', '' );
	define( 'SMTP_USERNAME', '' );
	define( 'SMTP_PASSWORD', '' );
	define( 'SMTP_SECURE', '' );
} else {
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );

	define( 'SMTP_HOST', 'smtp.gmail.com' );
	define( 'SMTP_USERNAME', '' );
	define( 'SMTP_PASSWORD', '' );
	define( 'SMTP_SECURE', 'ssl' );
}

define( 'WP_LANG', 'en_EN' );

define( 'DB_HOST', 'localhost' );

define('WP_ADMIN_BAR', true);
define('DISALLOW_FILE_MODS', false);

define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

define('WP_HTTP_BLOCK_EXTERNAL', false);

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_VERSION', '1.0.0');

define('DB_CHARSET', '');
define('DB_COLLATE', '');

define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

$table_prefix  = 'wp_';

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
