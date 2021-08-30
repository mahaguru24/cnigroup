<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cnigroup' );

/** MySQL database username */
define( 'DB_USER', 'cnigroup' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Roshan@123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'f0?jS_7)pes|zD,k=1[KOaW*7sBwiWcU|8}cEiBfmSi-k0n-pRrwwzO3j{9No9c{');
define('SECURE_AUTH_KEY',  '|=!-T+,kQ_~*hskb YD ^FvVNA8{G(B%~|Efz-b.PS7}=1ex8Z7-1cczs39R({Jk');
define('LOGGED_IN_KEY',    '=+P6bRZADjQ-V:6[taXja`.VkW%0vljMN2z-/fr6bn=|&pIb||8W~1o#nrmFt$``');
define('NONCE_KEY',        '_EGAK(AB5zD`O<9;Qz0__k^yDoH :3++i|:=v-#V3%+WsO3Aqkb!b|YN-QqWf yj');
define('AUTH_SALT',        'o].g]TZ6VCc!(.}|x`Kfh0BV$*rGw)@x<55/Vm:L]s% !N4gFO@sY-yF&#d9ClMS');
define('SECURE_AUTH_SALT', '#[Eu}1JW@}kZMipp2UMZ7b9CVOPgllEgz!u9{JhDKfE-*#[],.hZ-WX2(/*18mF?');
define('LOGGED_IN_SALT',   'R{_3C>a|}mt}wf+,_J%#zlm[u53r9mPb1W-wq!V:}6K9`)(OI(1%lBP+Ulxz]T;>');
define('NONCE_SALT',       'nSN^,{BrN|do?X1UG;=-@gk&EUw_&EIq6~7n80n-U-9kohRws@?1FI!%%;=rSASv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
