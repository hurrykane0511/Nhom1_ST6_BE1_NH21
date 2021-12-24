<?php

use Facebook\Facebook;

define('DB_NAME', 'id18165016_db_fraganceshop');
/** MySQL database username */
define('DB_USER', 'id18165016_son2k');
/** MySQL database password */
define('DB_PASSWORD', 'os&8z\}+%09?[]P&');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** port number of DB */
define('PORT', 3306);
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

define('EMAILID', 'shopfragrance0@gmail.com');

define('PASSWORD', '12345shop');

require 'Facebook/autoload.php';

$fb = new \Facebook\Facebook(
		[
			'app_id' => '1309726042773427',
			'app_secret' => '3515b3f4c892c411703b3c6dd2870a2a',
			'default_graph_version' => 'v12.0'
		]
	);
















function curr_page($str)
{
	return basename($_SERVER['PHP_SELF']) == $str;
}
