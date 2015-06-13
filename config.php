<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB', 'admus');
define('DB_PREFIX', 'adm_');


define('_ISO', 'charset=UTF-8');
define('ABSPATH', dirname(__FILE__));
define('SITEURL', 'http://localhost/admus');

define('SITEHEAD', 'Adli Muayene Sistemi');
define('META_DESC', 'Adli Muayene Sistemi');
define('META_KEYS', 'adli, muayene, kolluk, doktor, sağlık, polis, jandarma');

define('OFFSET', 1);
define('DEBUGMODE', 0);
define('SECRETWORD', 'admus');
define('ERROR_REPORT', 1);

define('SESSION_TYPE', 0);

define('MAILER', 'sendmail'); //sendmail or smtp
define('SENDMAIL', '/usr/sbin/sendmail');
define('MAILFROM', '');
define('MAILFROMNAME', '');
define('smtpauth', '');
define('smtpuser', '');
define('smtppass', '');
define('smtphost', '');

define('GZIPCOMP', 0);
define('STATS', 1);
define('FILEPERMS', '');
define('DIRPERMS', '');