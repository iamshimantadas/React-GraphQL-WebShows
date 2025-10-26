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
define( 'DB_NAME', 'db2_rorho_ventures' );

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
define( 'AUTH_KEY',         '4NI;RcS2!-kd$|K?4wpZ)x^i4I7[.Qk0m6f)nu?0C,^~qp#%s*829sl[m6L!37;l' );
define( 'SECURE_AUTH_KEY',  ';VfT)3 P<4Q&wG3}N{@#ZSswppo/k]x4;kC3R %`7u#$_q9?_zG_;H,@-x8v84/m' );
define( 'LOGGED_IN_KEY',    '[i$c32s7*r&`e-%%u~oRuFM >SR+dHdm^{.o<*M_e1+ csD}!jwB56Y@fJ5->Ld?' );
define( 'NONCE_KEY',        'RSFO(wbu8NNvoRw6$^]GBbnhhE4o|+#%IA[Bvu+R?fr[U[ufo{3cwbRHx(H6>EE{' );
define( 'AUTH_SALT',        '|rYFdKu/gT(QCG;$H%G_^c}bq9<HM1(WK[H1wM$t^MlIn3!]*fxGd^wl;iEwa%fj' );
define( 'SECURE_AUTH_SALT', 'Aui&cWrRgq!hVS%<$CD*|GPejw3q~VRr1pf`{U Iwc+:$r9u8|5y;L@:>B=^{V&B' );
define( 'LOGGED_IN_SALT',   '1PO*GD9I_U(,ZfL0=3t?i2k@%TA&8+%{XbB5/e/o;GAr#+!dr=x)}$<P@]R>}`Co' );
define( 'NONCE_SALT',       'hTX&O)u|S)o[ BGDS&pHC-NTunmp2<edA3=[rb$q#$4;.# B/z$Hg<t~)bv8wm[i' );

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
