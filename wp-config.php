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
define( 'DB_NAME', 'newshook' );

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
define( 'AUTH_KEY',         'SX]x]C(]qc c3BnmhFe=_A-6J:gpQwmx,Brg)k0ub9Nyw LqzXG@8t6|168}=U#R' );
define( 'SECURE_AUTH_KEY',  'Fdep5-PPsarlIqt%[JB-cSF5(v}* /RQ)f=GEP85hvya[zba,%<|4T2sEzpflt-9' );
define( 'LOGGED_IN_KEY',    'c+WuQtEcQ=K;Wr5 M9B@UE(mf%X)GSp)Y#|nJyy4}TC5`pOA.J u3;AN9Nie^/(*' );
define( 'NONCE_KEY',        'wV:/PMb%xvbngxGk *CX]=Gd#/WU!]((tw|${df,sty>rP%2(2 q~;Qs@O33}#K`' );
define( 'AUTH_SALT',        'KBeGyCs5TNYxJMI0G`!AV#PZAUDiDoA$(l0}/;T.n4>$of`mCwVV9$-r;));~)GS' );
define( 'SECURE_AUTH_SALT', 'L>vX0q=2e`8G{R:41_hc0$.NOeA@rs6vR}z/Vd-?=uLp_1}oXe#O-+/JyVGZGbRI' );
define( 'LOGGED_IN_SALT',   '{Eq2i_M];F+ore5E=oQ(4UpzCVQE)K@+gYd&6-cIQBs>^;v-Y!?]6EsU!&W~YB+2' );
define( 'NONCE_SALT',       'gZB%%fVq?4{zJ}cpWL)5<+pa9+vEv7H|O}/_C=;.,bg-{~$7G{Ep Kh/m(-a.`[T' );

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
