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
define( 'DB_NAME', 'wpsargam' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mysql' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '4kB-dLM<3bZ)p|Hl9fv% Xv)h*p@2N>uuej1H)6l3Fcx{.>k*y3^5~76#57}OM#-' );
define( 'SECURE_AUTH_KEY',  'yNg|,iE+i,0^2OyrQu|4v^Dp7p2U~EwsaOeEdFg4rE^G4o59kg}Hi%b?w@5/K,YJ' );
define( 'LOGGED_IN_KEY',    '&O-9PBM69mkjv(t5*z(2l0f|AP,/1]:R8e`KlUcwx*4N)/n`FEszMTS.S:HM3Rjr' );
define( 'NONCE_KEY',        '[Dq}YV=s@c|V94;SIr1T}(3m>ps{jxs;Rh@;>uY%+CEs&t/_Yg-x{d=+Xh]rLoNk' );
define( 'AUTH_SALT',        ':Pkk+s>@{eg<Y(ZU(kg*9}2GX2LuL t.H#)&M4^k@}rZiYwWd}(J!9u,CJSbw]an' );
define( 'SECURE_AUTH_SALT', 'RQOiE_?{%a#-7J7>{1-x:&[*IH- n78;NHZq:n c(nVO~b;z-V=97,#v+YI`}]sm' );
define( 'LOGGED_IN_SALT',   '9xS`2p^/EWWK4IKn?@Vr4s3!W/SV7ooN!5kK&T@x&0OOJd+?{OxP(=O;OZW1w(f/' );
define( 'NONCE_SALT',       'fk*h[C4Pv|Q;%J[GYMng2!og_T5{`9=XJ+seN5$/LLec;8cI1lsSs}EI.-Z:x6]|' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'swp_';

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
