<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_default');

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

define('AUTH_KEY',         'C>3#[i~+oicNxuHPN@.0X+bzv?!Jm)F>[%ZnhK,{ ^:a^8fTVdhQu=^?XoFg+wyA');
define('SECURE_AUTH_KEY',  '/;{aEdT-ZWW.t]>ud19,=dhjpA`t9@+!@|-``Ih$%OBDi^SXUpODwvgo3:m0{-]o');
define('LOGGED_IN_KEY',    ']9t]Ua-frasElJ SW%:h~+aHk~%>=g5jl[$Tj3*`2 V(D|OQwf-k=?aBmQSp2^h1');
define('NONCE_KEY',        ';L<^MKQUGB%+ow&$7Ed uK4E=t_yA~#5Ygv|g=X}y1`W7doZ`-C/M /ZxD$Txc=J');
define('AUTH_SALT',        'O]]2BSS[q]DH9mjC<&`{9>A1A5U_oK.h:kl]pe;:fR->$0+$Y_VT=xUEyd+7BI<F');
define('SECURE_AUTH_SALT', 'q.=m%|yq/LG6;tO{uhd@u MNo~7UF)QY5|0G{n`|/!)86b!dI6|U+e3]z*=VJJ;L');
define('LOGGED_IN_SALT',   '1/ob CGJBW Ptql<brGrOAiqK-R[&frM~i9)vwJ{H&~CIXNfpgg;xyTE9rgwgJ}0');
define('NONCE_SALT',       '^b 0+<{-L(|0.U)2}70ZYX1>|=#&^#*Dg}3_|y[<;G~cE#xkPLcPT*H -NPL?Q{5');


$table_prefix = 'wp_';


// Match any requests made via xip.io.
if ( isset( $_SERVER['HTTP_HOST'] ) && preg_match('/^(local.wordpress.)\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(.xip.io)\z/', $_SERVER['HTTP_HOST'] ) ) {
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
