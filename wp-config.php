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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'burgerhousedb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', getenv('direct'));
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$w0jr h/OLE;9st#qu~8Vn/yJNFEfH]_K[65F!?OU@L2mecN,&7=Gsu]Q:H<-&`1' );
define( 'SECURE_AUTH_KEY',  'AREU<#BkH-4SA|b#o^QSug>,F1a~(?dqgT-yq@fsNJ2sj-_.aEiMPDR!&XJ.Ld3L' );
define( 'LOGGED_IN_KEY',    '9D{TW[zLdhsm#!5]oBcfwV*UCy9EkV<2Td3_xZ-&k_uflOr5Vv!1eSwl6!&[)Gc]' );
define( 'NONCE_KEY',        '}~G6@lkyaWwJ5s!]&=W@s]^>#z+xQ7bYD`!_9{Rp!TY8ZQ=7{`/zudwSI|3=t{N6' );
define( 'AUTH_SALT',        '*S/VZJ}]Hy_#~hZ1].=$ d?UJ8THTa%j7t_q4d}&.fli*8~yJ77V0dq)*pd@[%y-' );
define( 'SECURE_AUTH_SALT', 'e,2RfRUCe@uP;)){EE4~(&nLP+]t)9uv=x%*={A^kLQ|-s;CR7ZUr2R_urh_%JQ<' );
define( 'LOGGED_IN_SALT',   'jSh&lfsBWS(=vD!i<l1 <JYoi}e$kzze;cK[/{WP]MHcXkt5g-HC>O7ve*GG]b+&' );
define( 'NONCE_SALT',       'ZU,?civ~ wUWInv?G6n3~a[j5{;Zgu0WrPE0o,P%]8pbjK(L4R;fQrIwNQyZqZHz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'burgerhousedb099_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
