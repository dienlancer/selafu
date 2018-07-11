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
define('DB_NAME', 'selafu');

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
define('AUTH_KEY',         'yj{2/`eXj-xn5{t.+j6EegJ0Za6pmG<f<!7)Qk]V0A7.zbo_N2#2?B35o+CP_bh<');
define('SECURE_AUTH_KEY',  'O&3E~f7v%+[wv8ySzw2L:UXHB7n&g?T|LxQJ.X^FHBw=#IwU]C,U,IcK1o]O/G|r');
define('LOGGED_IN_KEY',    'KiZ7B+xsYd]eu;ejgnU4l,?gQw@GF9+d^t?sTT7fl~VrT,BtzV>mjpa$2,6);8A]');
define('NONCE_KEY',        '+%BmeF$5fADm$)K<[ ^Tjvi1ahoxihnD~~=Uj{?Xitaqafbe2!Ukg^rL@SG4d?Z[');
define('AUTH_SALT',        'b[k?Dgzpd5TUM {5#6eJs>E3*$ Dw~[;p]mtf)WO,j]<)UU:d>}B,DX6.,vJ]cS_');
define('SECURE_AUTH_SALT', 'ANR^ _nhokCEM}y,tu&Bh;i;&x19_OL$f.WCpo_->~!6oo0%+!?5REi%(L78gNUA');
define('LOGGED_IN_SALT',   'S09@[]%+*Shf(DNx rLXO/ dG|91B]jgA-9XLSTSy0Rnhoqo~v/}=V3Fel.i91PV');
define('NONCE_SALT',       ':;3fXAB#G^{{BZ~d!7bQP^<8i$)[_vg:-Q%C<|%K=Nkn)}.*]~/~sj7|ZENj/fag');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xzv_';

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
