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
define( 'DB_NAME', 'tienthemes' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'T%MUx,^C`r8KKgK;gzAkxdv-4/%jjK2mq%)8b6&4<UQ.9q9A8Gt=MkMVUbD!UV&x' );
define( 'SECURE_AUTH_KEY',  'lV)DPLUetVXK:6*yfZ,$2ELXU }=VB?7{F:6M0e!{lsmVp I X>9I##;be]kRcDa' );
define( 'LOGGED_IN_KEY',    '7/ey#<3x7D?;P?pz^DHpcC,h3U&_16z,#;l{`+@ d$STf@-2|g;ot4_k~R$mW{xA' );
define( 'NONCE_KEY',        '1+U)LHQQhX^:XJy;szvuXH}`(H3wHf r_#G}vif<5O&OIg+Xp]FDs6SdVcaU$w<Z' );
define( 'AUTH_SALT',        'z>Y> 0Y98jLO[kL)+C?24ci*D<s)Mm-<7[O1izU=f7HwJy^i=EAR*].XX[T::]#2' );
define( 'SECURE_AUTH_SALT', 'H{Vrm{6&d%AFFD_:Bt;X)=eZ!rX>ZJn[_0{O,DxLbnWAUs^x f[9|^+TQ.i49|f*' );
define( 'LOGGED_IN_SALT',   'r(Fq37>-UGVHKq)<UlCGN))yK^=g,6RH/6L^HHJ^F^=OJut#nHDms[{D*-3R<kk|' );
define( 'NONCE_SALT',       '-S%_I6tG*/R7@!<]T:{AHIuTZ C[A!0Qnza__MGOIFW$T7xcj3dm,E9V,!`ccN5x' );

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
