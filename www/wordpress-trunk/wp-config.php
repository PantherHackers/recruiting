<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_trunk');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         ';HZ2ae|Ukep=wa-iy mW<n!?{ZWpMR}ABnjdEMV5[L)g~+cp{(]xLo?QUP[_n!&?');
define('SECURE_AUTH_KEY',  '-9rsj8>Noc0NM_HxRHVQRb1+i2Uvz?1/]>`1 kBB1Vhlp*|`Jw~t@tj0C7d-&Qf0');
define('LOGGED_IN_KEY',    '11ahh/3yq)=8^#S]fN+l-*D_:W19GGW/+|8kD-@gp8{2@XL4hRGn%/ir%0XBDEms');
define('NONCE_KEY',        'i)y70DD9Z|3>d`Bvdqrd1=Y&bEKV?F#Q2Xe?-wWnc4u0LLlu-vQ*%16t3_>5IT+b');
define('AUTH_SALT',        ',6LQaQ|!;M]]nmCDcPFC++^l+?fYTI_])XA%TdYR=!gh;~C[tx?bYKrxu*FeG?L ');
define('SECURE_AUTH_SALT', '<Ocx9J2y^Jp39X8Akg)fG@o_L2}>T*&X,O~1x726q,GKa(Si@s@;2*1:4:G57@{{');
define('LOGGED_IN_SALT',   'tRo-GwaoW!@r6h%?6|;(I{qVyDv!`A*keVr(hXF_<;mDbSrxw@|*e5P>%6<`dFMI');
define('NONCE_SALT',       '8qSj6q-w.G4rWSIA}OD^DHY<t+-%?XQtonUT7y#WSfNd=^+aiBa[E/2usmlPF:(f');


$table_prefix = 'wp_';


// Match any requests made via xip.io.
if ( isset( $_SERVER['HTTP_HOST'] ) && preg_match('/^(local.wordpress-trunk.)\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(.xip.io)\z/', $_SERVER['HTTP_HOST'] ) ) {
	define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );
	define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );
}

define( 'WP_DEBUG', true );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
