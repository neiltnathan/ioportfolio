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
define('DB_NAME', 'neilnath_wp706');

/** MySQL database username */
define('DB_USER', 'neilnath_wp706');

/** MySQL database password */
define('DB_PASSWORD', '8)S1p8O8)Z');

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
define('AUTH_KEY',         'dkkzi98ms5xjokmugcpujae4yppslrc8crlojukbqavi7uplvtyt0q1rjd6lmz6q');
define('SECURE_AUTH_KEY',  'ijtgxtdvwxqohxaresm7hxsksumrhddkwpidjny0u9etrxlx9wtnluulbkqaauej');
define('LOGGED_IN_KEY',    'mmpgsut6e4lqejd4ddndoqioqqptg202rrru1ag1jaqmlazvjkmaujoy09oa0xbj');
define('NONCE_KEY',        't1qrlowhx1qh1xmul5funwdcdbhoiyv7bgr5eemrnfj6hord7zixtn1c1mwbims7');
define('AUTH_SALT',        'p0wfaokfe7ztqcuiahqfsayvtvbajp6txrnx1roi9uarmthcfyugqudpvrvetipc');
define('SECURE_AUTH_SALT', '2br5m0kaleutosyruws7mweeewytml4tmolutfcjtpi20brpa31l9o0ic21io5rf');
define('LOGGED_IN_SALT',   'xsxi7qzbeb9co05kvvf2vfeok1nub1ogrbtujfmqghndma83xrllbsk1zzdb3jcp');
define('NONCE_SALT',       'kztujpxns9w80gfkr52axb9fjfmepxri75xrdeuuz3cl4frcjgvbafxndzqqa3kx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpzq_';

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
