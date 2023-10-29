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
define( 'DB_NAME', 'tiendaorganica' );

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
define( 'AUTH_KEY',         'B&hVh#6@sX_+$H^vR<&l-c>+)EMsAg<+J#T`q-H*YP7@2,s>&|(M$T 8}oW8I`P[' );
define( 'SECURE_AUTH_KEY',  'bOy3Y[jliahWC[Fy+^XB8LmpGsw#E]6ix)$<DJJ$tz{;EPR).B}}d](|L]XP}VL1' );
define( 'LOGGED_IN_KEY',    '17*X Rr$j ?^&sd=~^zcF&TucB% 2(@V(C?iCf83MZ9FFyUoMG?bd{q/1KJCMY V' );
define( 'NONCE_KEY',        'Uku+M(cfEmU{A&i47;Vk>?QKFW0HvWI6](g#JwW3N=}M=Kr+z(S!-C(m$G[{.TE+' );
define( 'AUTH_SALT',        '}#RkFE/Emu[/O8+bZR-2_1L1DI_pg/s&l<n17k(yZ<7V7XnnhNpVHNSKKq8GtYw%' );
define( 'SECURE_AUTH_SALT', ':GWn0{[>2RqYDHPf;NZ}{vk*8T3Gkg0P5MrFg: M$S:Gf(Al8.wl 7=CURcq+Ej7' );
define( 'LOGGED_IN_SALT',   'Zf!wdG?[[jk>8<X9{ D3|VW6`>px<MD{F#C+R!P;4?VU/gRtezUgS?4e%0<lcWHU' );
define( 'NONCE_SALT',       '(k@r,4/F-3c9g=$]x1v)tv{F//neHm|<l )(:xt<NR2Qpox)3y>]_uvVb83L@`QX' );

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
