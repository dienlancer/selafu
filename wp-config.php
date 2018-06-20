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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'selafu_new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`7|aJHgq:+,rx!ZC?RlxZ9hUt@wQ&Bk{{px9b=yE$gkGI{iT&iKj?&6Xp(8MifpF');
define('SECURE_AUTH_KEY',  '*!qKq7{W<w~ x?21PNNM$VZ2x]Z&/5-{6g-a0u1+hLH2UAHU:#gXtYzL]<IZ-H8*');
define('LOGGED_IN_KEY',    'u7i^)0tj7q97VTUuc~s~6ki66iWNu;$Z&<Tv=qF5my/ =S s6s+`7, [8~I!JYG_');
define('NONCE_KEY',        'l0C-t2rDYX/x*yq/DNE2q}fDzijC!i-(,O_uL7[<9EFwf_~fsIE>Lu$l20sR{c_6');
define('AUTH_SALT',        '.9N8Fu]7LK<ipK:B;,f+,H5=RkrCjX]Y#k@T/lUY0E&k[&*)szqs}3OS$Qe*_!% ');
define('SECURE_AUTH_SALT', ')eZ|y-S$qQ2h6W46}t|h~+Vhv@m;cHPTy(k0<{DXq}B/X^{&?ssfMn!bGjUA|^Yx');
define('LOGGED_IN_SALT',   'r5NOwyD#L!C/A6cX4Dv@.R(Y&g<]JjM>+[FZ/]=@*wM84=Mu.f@~8UoAkkA$cy_l');
define('NONCE_SALT',       'Q3gcl]gk4ZV+!{wZCMbSY!dIR(%-un{VNwmQk#i{HvZdA19c[J?[JM=N?2?QS&]h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
