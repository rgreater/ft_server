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
define( 'DB_NAME', 'ft_server' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

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
define('AUTH_KEY',         'WNE!)n0)/~Iv#l6-IcU#sNde?[p(j-% %=Lmcz6|6fIaR6gUq?jmF8jX.~N>n&|v');
define('SECURE_AUTH_KEY',  'R.<7r9+=<7oBgc?hE6$;1@z9RHC{)@Z?0[)Y>rm_be6lQX|FJ-qQ$ZM-RjI-Gdl7');
define('LOGGED_IN_KEY',    '14!sKdT*IJ:r-0U8o- h%7GT^Rs.PR!FKEv#Fdbm(ln=4^OAsb:>#0*@!WM+1X/v');
define('NONCE_KEY',        '*+V52RGy}d[s#|X{vwH7wq>aIMoq r0M+Eijrx=$VLoz/Dwg)A)g:jODP$UL}Mk-');
define('AUTH_SALT',        'kA-rNB.c(Cg.)`JR9(IlmcEK_E}tC.w98Il,{>siwWsMoOzz<0Sy-W|mk O2NQs&');
define('SECURE_AUTH_SALT', '!-]k3us3^/)DkP=0ULw5>53(uw8[G}9(sjf]4-o75tsi6Xg>OL}KXl,-lZKYVED=');
define('LOGGED_IN_SALT',   'M:PyZKnx$!S6(NL!PNKz-%+DB;A!p+M(7mDn]Ja{F{]/j.O-H<CL&_l)}lk`|F.N');
define('NONCE_SALT',       '14j3x;|!*8-10%,_~^W*|8t9)Rzg6n@_!_kv|[|~KF,q-3+=z!Pe+fXmh9}yjJ&i');

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
