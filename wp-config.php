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

define('DB_NAME', 'db634898222');



/** MySQL database username */

define('DB_USER', 'dbo634898222');



/** MySQL database password */

define('DB_PASSWORD', 'im@rk123#@');



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

define('AUTH_KEY',         '& o{/H0~p|kMi=D/GXm|]y0^9cK_B44kY cxHYj]DP,+8h37b,eYMFp@6Qq|FeEs');

define('SECURE_AUTH_KEY',  'eDc1):25:P_sIBg$Yb2B{NsNciSG@5Ny6:sP-zMwMlrvsQ3hA.boEQg@8C2k%b5@');

define('LOGGED_IN_KEY',    'bu1N*Vaa{Xmn&!z?8>s:I?QvfNr.<qA$K.mNrNDy^d6scFKN/%/go{uX~Mjp[s;;');

define('NONCE_KEY',        '1-?}$Rai3N}u8#MKFgpOdi>}i_,jkIFeP<{|1~Ub&V4GpfZ]NV$s]W+d0jVj*vnu');

define('AUTH_SALT',        '9Zdn%WH1Gm@S8y/bV%Pb<3R.)$B>lc-CzCalj[DRNllK#t2,{Q%,dH|rrTXYPyp}');

define('SECURE_AUTH_SALT', 'Eu70=0}FegEv~Ri<Vq!NX&|&GA5oZ]cl-u>MkI&7n)<5HbDc7]/JGLh%V3s>9,yj');

define('LOGGED_IN_SALT',   'Rs vZB6}hK=nR&_UDpFokP.f,a;D@`R`Jd_/F=_5UCA}`{v)ZcsRD[4qFnlR-2o.');

define('NONCE_SALT',       'wQQxgruI),pCn2r8QUK$-(x?XK=6Oq$Wg=.r}5KdJhtACSq2bRkmq5n*;*n{A__}');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'ad_';



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

