<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'test_wordpress_v1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'ingmorales' );

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
define( 'AUTH_KEY',         'Jjh>VV(>5ls?YTCiDj`]FU=VRK$6E6CKPd<V%ZmjQ&Fr)(3C;8s&;Cqu>yqhz=$Y' );
define( 'SECURE_AUTH_KEY',  '_rEGDu}QhXG O+&-opwlQspwz}<^;<g;akGs3s$IzYJxowN]UqQ;aPhQU_yc0}PZ' );
define( 'LOGGED_IN_KEY',    'd {@Hc:22}3`BgyMc_:H.)M?}UM;]POAJ&&_S[Yjk $n{iWGJ#0p}Hxe3#VQ5~d$' );
define( 'NONCE_KEY',        'Qcvb}cf%+Rud4na#;Hk]_V`bTum.B{4eWRM<H)_Uf((tALy{gDxX?]y[Qz<O@Z{!' );
define( 'AUTH_SALT',        'D#VZCxt {s($L)Sm#]?^4JmqGMsl>.z3NA4vuLQu%Q{T#)Z*`fp|oNLZuL-by:vU' );
define( 'SECURE_AUTH_SALT', '57^o|,O.z`UrSEu{4&_AP:4v{X9Dfigp]=Ot+s3d8gf+H#@]]OcRn:TH9;I+*-du' );
define( 'LOGGED_IN_SALT',   'F8)o?hic;Iua+A?U%.pg)x5*TCt:1@qSS%o}Nrr4 HY|JnkC*Z;+Z::^Xp}1ly.y' );
define( 'NONCE_SALT',       'wjyI.I:[?b^`a,i8F0;52LJdxMV}@ixkoFR4j&]3Ci&-voYgv<<vmXe3)U(eX $Z' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
