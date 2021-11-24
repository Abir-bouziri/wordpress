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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '$ET1_Ul8 xQH}K4uZ[sLDTTF`{n3DH]1`~w0g6Cf])IYfN-C9:3O-*G?36IN-/7d' );
define( 'SECURE_AUTH_KEY',  'MQ;$SZex!m@D>Y$kS!fUC>mM^(^#NgN=Jk#bK[AvKk;Sj??obm3[l_2^uN}h<s+S' );
define( 'LOGGED_IN_KEY',    'N9VcAN#sp[/{rqY7PmCAs6<!a<iMC/18jD~0jYM )X2@K*}[R:*J<$edW/Bw|T=<' );
define( 'NONCE_KEY',        'j5,yIIWO)|&]}BsFjb,~&UXfj>C3x|[Ok&(asJN`9bM!AvlUbtppum9c=k6>|b=S' );
define( 'AUTH_SALT',        '#QgZR$rA^(uN);m^,fOdAKLw^YA3k;0,UV(@aEz=-B)KY]F#Ko{5r`U( 5i1=iDt' );
define( 'SECURE_AUTH_SALT', 'e</p#Fog e~:AC(q$_&EnDiC0[5&9# -Q5$u<{T>,p6IYW`tj3c1ZS(^JrB:Ur9Y' );
define( 'LOGGED_IN_SALT',   'K/,<I$o$B+<f (`&e6!1M_in9&j[fwN5xI>D`3-9AyE}%>Cjdj:AQ:dn>NY^SRL:' );
define( 'NONCE_SALT',       'w>~z~an{Tq$toSPcGAud-?efk0<YbqH{5 k9q]vlMj_)jC9#vGRd&Akdo)4#r$dH' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define('WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/wordpress/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
