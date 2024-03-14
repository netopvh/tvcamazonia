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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'fn1d2f13r0' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         'q$LtHVQNAxz,*ZccPX^$Z7jeBchzCr$,Q4!m9Ni%%!ZT>cC+ZgcM*ypC=EmxP)u4' );
define( 'SECURE_AUTH_KEY',  'NVC~c{p5NeJ|^&jJDl~Deb7s+S=(^nYcMi)ndJI2fUQNn9@c3sTe?,oIId2?6CN+' );
define( 'LOGGED_IN_KEY',    '7cF$#{+/_a~K|}ZYX=U;7m?QVBa*z~# lhYMS;{X-E{<RRP*sffgolpbKw.AE*q$' );
define( 'NONCE_KEY',        'B>bV+~ELr_C7=FsL)ybv}_eR!(@]GZ~1dZqwjD1(;( fN+~}`HNEvAcsb{$q+p;G' );
define( 'AUTH_SALT',        'G~v&V9MhMP`eFzK4T0R<3>J; vCH1z5&E!ezL{=b[S]&-J}GtCdntz[V)P@a1wU{' );
define( 'SECURE_AUTH_SALT', 'LL8Mu;b_KCS4Ir10z{M#SQrf`!hDW0Mj2taezNQ)uv0$?mV^XU!Ap;$7D5Y5`?aH' );
define( 'LOGGED_IN_SALT',   '3;zYc`$5IP<LzI.pae!f3^&|,ZLEWypOzs;h=jK&hTgk17yhVrOuyc:=@o>EL@k^' );
define( 'NONCE_SALT',       'FiCiff3p~Mwx:U,l~4__<X8.p,|]5-M!mG2.tp-<x78OROO9vP<L3p#_<OgjCdHg' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
