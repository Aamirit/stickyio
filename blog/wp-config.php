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
define( 'DB_NAME', 'looper3_blog' );

/** Database username */
define( 'DB_USER', 'looper3_admin' );

/** Database password */
define( 'DB_PASSWORD', 'a6ezc!#HE%6s' );

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
define( 'AUTH_KEY',         '3^~ N%F0{5X2NMFwZ^ u(9(&j6y_wx6JB-{-(Sq>Mq+qP)G5rV~NvjyZ)t%gBfNe' );
define( 'SECURE_AUTH_KEY',  '$AU3!g!f(r)._!Y|c#^2@?)l4ez/C=)AoY^fD}Mx+k@F<d$^(R;88I[32%`8A/W(' );
define( 'LOGGED_IN_KEY',    'M/j6W] Dfl8ttda&LerJ}t(x$Q?|ZplIg^kty}NN[`U,=uzk1o2#.]+bi47Efd=_' );
define( 'NONCE_KEY',        'QtK4!;W!T=;&r#e6CT(l?v0.L5>^&]aRBB^*d%n7SUbJ>{U:>hRVE}:]^L_r[p=!' );
define( 'AUTH_SALT',        'UCC,FmD}&G~DN:/m]0M(SFqe#zkCDa_Q=Ebq|-MIl-(WDBbsWj l,I&,fsDOdM-,' );
define( 'SECURE_AUTH_SALT', '{9e9u:y|zaQ)rFE8#I9/n4e]#WkThXU3yYKP&}YU2?yq3JgN)eV@A[g{Rx3~:#z^' );
define( 'LOGGED_IN_SALT',   'q{a2*%XpD/sot1n@dH4bhCfganfa)DswaSPP0z|#g:IwF<hJ=1E>Nb,CW>I]R9R{' );
define( 'NONCE_SALT',       '7Q,PsfdcJQA`us!misTEx&:YJVVXyQ;a-:t2PW;ZL9mFA#*kM;EHFR1>$cX<23(!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lp_';

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
