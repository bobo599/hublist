<?php
define('HUBLIST_DIR', 'hublist/'); 
define('HUBLIST_DATA_DIR', 'data/');
define('HUBLIST_USERS_DIR', 'users/');
define('HUBLIST_TRASH_DIR', 'trash/');
define('HUBLIST_BLACKLIST_DURATION', 365*24*3600);
define('HUBLIST_IMG', '../data/uploads/images/');

function h_log($msg) {
$log_file = GSDATAOTHERPATH . HUBLIST_DIR . 'log.txt';
file_put_contents($log_file, $msg . "\n", FILE_APPEND);
}



