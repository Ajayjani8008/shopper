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
define( 'DB_NAME', 'shoppers' );

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
define( 'AUTH_KEY',         'QlN)D?n=*{~_ZwR=gU{)GQV->S-%_ZK>f<-|}>3<}lL^k|hJ]tmqJv`0t&s](,`r' );
define( 'SECURE_AUTH_KEY',  '5K: :q/@b^TKTdfW?2cnWPbNn7NH+$ocX5cmTZ_nrqkr:Cw.Sk,Bu?|rLz)-m)Q^' );
define( 'LOGGED_IN_KEY',    'q;I ugm_^mvLnB54cg$yV.pz<ye!INvFxOoQ9%7DsxDpzB;F~TCFdmaV5Jh5HIL0' );
define( 'NONCE_KEY',        '.J3~Wau1L`D^&@CL$[!xp+Q>).w=lA[O!Ax%LQq!*#<Y({bYD_6PM/>bSfa{`b+@' );
define( 'AUTH_SALT',        'CGXeXs{kQcO8u%{B0O N{#_*BBu E+b~G0 R$H0x-v=>h%._VFycj:e}}G+aYZdD' );
define( 'SECURE_AUTH_SALT', '3]F3&_%3~Es^Y1P-R%=$fCa]|1$L.AcQ[z3f~&Q_7@QG$)]?yp^iDx.B-_:oDi{;' );
define( 'LOGGED_IN_SALT',   '@PA62$5,^9NP%Kr%48&-yURq$gt8/yHWpc{5s679#(_]=ujF3*_WqUp&NF0RY)PC' );
define( 'NONCE_SALT',       '4eCogZ>wq#0cGH)Hc}vy~_7sqZeD,1m*ka7dTO&Zk!^hU !`,N$6g(b6X8g1RfYK' );

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

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
