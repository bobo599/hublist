<?php

// No direct access
defined('IN_GS') or die('Cannot load plugin directly.');
$thisfile = basename(__FILE__, '.php');
include(GSPLUGINPATH.'hublist/inc/define.php');
include(GSPLUGINPATH.'hublist/inc/xml_db.php');

// Register the plugin
register_plugin(
    $thisfile,
    'Hublist',
    '1.0',
    'ITLOGE',
    'https://itloge.it/',
	'Manage ADC NMDC Hublist',
    'hublist',
    'hublist_main'
);

// Run this hook everywhere before anything else is loaded in.
if (file_exists(GSPLUGINPATH.'hublist.php'))
{
    //hooks using admin tab loader
add_action('nav-tab', 'createNavTab', array('hublist', $thisfile, 'Hublist', 'hubs_view'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Registered Hubs', 'hubs_view'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Add Hubs', 'add_hub'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, '', ''));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Users', 'users_view'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Add Users', 'add_users'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, '', ''));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Hublist Configuration', 'configuration'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Pinger Setting', 'pinger'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Ban IP/IP Range', 'banned'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'Database Folders', 'database'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, '', ''));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'View Trashed', 'trash'));
add_action('hublist-sidebar', 'createSideMenu', array($thisfile, 'View Log', 'log'));
//add_filter('content','hublist_content');
}


function hublist_main() {
	if (isset($_GET['hubs_view'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'view_hubs.php');
  } else if (isset($_GET['trash'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'trash.php');
  } else if (isset($_GET['edit_hub'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'edit_hub.php');
  } else if (isset($_GET['hub_details'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'hub_details.php');
  } else if (isset($_GET['hub_ping'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'hub_ping.php');
  } else if (isset($_GET['add_hub'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'add_hub.php');
  } else if (isset($_GET['pinger'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'pinger.php');
  } else if (isset($_GET['banned'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'banned.php');
  } else if (isset($_GET['database'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'inc/database.php');
  } else if (isset($_GET['configuration'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'inc/configuration.php');
  } else if (isset($_GET['users_view'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'view_users.php');
  } else if (isset($_GET['edit_users'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'edit_users.php');
  } else if (isset($_GET['add_users'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'add_users.php');
  } else if (isset($_GET['log'])) {
    include(GSPLUGINPATH . HUBLIST_DIR . 'log.php');
  }

}

include(GSPLUGINPATH.'hublist/inc/include_front.php');

?>