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
define( 'DB_NAME', 'wasabee' );

/** MySQL database username */
define( 'DB_USER', 'wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ']wIk#Ck{8{iJ051$?&*N<=Axi<6`a7vPoU*J|$sZafifibm~Zx~ya8|v3F2T6p!.' );
define( 'SECURE_AUTH_KEY',   'XBio7,KTyZ6nirq0Pr ^)A0zeTCG5l@8,==,75kc ,5/7pTq56O+5rOJ25LQ1iHn' );
define( 'LOGGED_IN_KEY',     '5.wxj|w8Bi84nV2VB,JekK^oL~oD(m/zNe>3txiS*]=Q@R{!~Xm?OBb~cz~jJ[&8' );
define( 'NONCE_KEY',         'DW0{6.=Q>$AWN`YQ&aOxoKI.iC mg!dZMHLsq;1?eNu.:H3]T}d%*|>.rjXzwqO{' );
define( 'AUTH_SALT',         '1j7NGs`Zp<.^Z7qHGbBPXh#Ya+K=bQpjTTUU;D#6pe(eg$5@X@syZoO[4l>HYVC|' );
define( 'SECURE_AUTH_SALT',  'H0J5[0ZnsT3VrbJ/)s,gsOl_QyDpJR)s:Q|_x&,,]|l+E?k1th3KTaqPF9^a,8:c' );
define( 'LOGGED_IN_SALT',    '2[X.qvn|Q)R3Pd]D!3u^LwPDip[%fc[p{.FD52hHm`e/v&N+*wlx!j8j[3l m_f^' );
define( 'NONCE_SALT',        'zTWpeG~8,:R|C,[EuH:6U:?HV.T?[`P;-4we4:<ZeE!h *O)i;b0z^F1!N6V%D._' );
define( 'WP_CACHE_KEY_SALT', '?9eK3 %3f^f Vmgz~WB?D`Z>,Pssz~S|4Fpu0nKo9>KqAnq>U@&{ l(PM0j)= lr' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'SCRIPT_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
