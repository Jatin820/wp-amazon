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
define( 'DB_NAME', 'wordpress_gps' );

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
define( 'AUTH_KEY',         'BzZ,R:!dnJ(Y}~7|/q)ftANNIF,s#u@nxjn}IUub&e00WQdW3]kKlW?uQP2&h{kQ' );
define( 'SECURE_AUTH_KEY',  '&_s{LoBg<jOH%-NKzT,w(MNg% !ZP>T=poM<Td.%nx@Uo;={QXp{b5Kv;ypS^JJ(' );
define( 'LOGGED_IN_KEY',    '8#J[2*59([Oz7k<C%IBxH0zq%3x}wj)6)T:KZ}$[u58&5K@vUatUo;^[q$GV3VO7' );
define( 'NONCE_KEY',        ':eZBD;<wcpb0?ReJ&fgb?O.A`DkkGf9C~1rD$B?M3=|uMm>=L#3x!8d^mxS^{R0)' );
define( 'AUTH_SALT',        '2}-20,I&v%|3Hu~sP&%d{Xa~_/-d&h306TSH0TLH3B,qR<yQ3nfrG_E1EOy<;D)5' );
define( 'SECURE_AUTH_SALT', '`A{.~Kzq[3*&b~QeKm014t/@J7-U>5=&s6%?#dm#]|FMV(k-_&<HT.GF_qtkPNe}' );
define( 'LOGGED_IN_SALT',   '<@#<-i4m$?:4$Y}oMHV_5%gZgtby]z/4:,2ndIq_/(&R_f`>+0?p|WO${7}JMOO{' );
define( 'NONCE_SALT',       'l,Qag)a~mE_i7I|X^q^FB;P^hGt-4cFMSn7)Vo^GoI88tsC%@~-H-8f+u*8hE3J4' );

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
