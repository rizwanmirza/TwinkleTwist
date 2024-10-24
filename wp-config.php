<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'twinkle' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'TWmm?Q^=gI`>3r(1OEX>36LJ:#1tLmALxy_@^$U5EWl3q6V`+81-6tw@%cf:H1nV' );
define( 'SECURE_AUTH_KEY',  'WRb&`-T#&P&2&z6R5o`LgM~oGhqvgTb4nJ$dOW2=.WO^jzAu!WV^P7]uA|u+Z-&h' );
define( 'LOGGED_IN_KEY',    'Br(^YD|GPgG0.*fgL%a#o8|PJ=4)>)~ 7BA`PIt/ e}1||wjb=S37z`^x#7o_F1l' );
define( 'NONCE_KEY',        '< %K>W)fxr[p/#^h=p9S:<hZBJMAX.JRq)#mY#2WXhLU<_SH#i5x1]5`K6~9Ha4u' );
define( 'AUTH_SALT',        '?!@y>g}|;,Q4#D2O(q,fLDq5XN <$j9$7S2.yW4NlEE,d4(gUVM(%P7;e|r-DpQP' );
define( 'SECURE_AUTH_SALT', '`%hA,Hl>,6?`K _Xu/>^!I>>@[j)7W=@%q?<;0?is_~sxWhk2qnN;eBPQg[,{D!{' );
define( 'LOGGED_IN_SALT',   'zq;p74d^a!En-cZ`)P]jB_uv{gKfmF H$OB*~6%4Je]$UBu*Zf})k)84IZBQ1D(I' );
define( 'NONCE_SALT',       'e{VnMmn,ijn!R{`l#BqD~S|:iAZ-RB4xa;c1 `]q44zrT3*Z3]J`&)}1<LA?j.)>' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
