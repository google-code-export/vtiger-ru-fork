<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the 
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
********************************************************************************/

include('vtigerversion.php');

// more than 8MB memory needed for graphics
// memory limit default value = 64M
ini_set('memory_limit','64M');

// show or hide calendar, world clock, calculator, chat and CKEditor 
// Do NOT remove the quotes if you set these to false! 
$CALENDAR_DISPLAY = 'true';
$WORLD_CLOCK_DISPLAY = 'true';
$CALCULATOR_DISPLAY = 'true';
$CHAT_DISPLAY = 'true'; 
$USE_RTE = 'true';

// url for customer portal (Example: http://vtiger.com/portal)
$PORTAL_URL = 'http://vtiger.com/customerportal';

// helpdesk support email id and support name (Example: 'support@vtiger.com' and 'vtiger support')
$HELPDESK_SUPPORT_EMAIL_ID = 'michael.debian7@gmail.com';
$HELPDESK_SUPPORT_NAME = 'your-support name';
$HELPDESK_SUPPORT_EMAIL_REPLY_ID = $HELPDESK_SUPPORT_EMAIL_ID;

/* database configuration
      db_server
      db_port
      db_hostname
      db_username
      db_password
      db_name
*/

$dbconfig['db_server'] = 'localhost';
$dbconfig['db_port'] = ':3306';
$dbconfig['db_username'] = 'vtiger521';
$dbconfig['db_password'] = 'Rkuv5ZCaGNwK';
$dbconfig['db_name'] = 'vtigercrm521';
$dbconfig['db_type'] = 'mysql';
$dbconfig['db_status'] = 'true';

// TODO: test if port is empty
// TODO: set db_hostname dependending on db_type
$dbconfig['db_hostname'] = $dbconfig['db_server'].$dbconfig['db_port'];

// log_sql default value = false
$dbconfig['log_sql'] = false;

// persistent default value = true
$dbconfigoption['persistent'] = true;

// autofree default value = false
$dbconfigoption['autofree'] = false;

// debug default value = 0
$dbconfigoption['debug'] = 0;

// seqname_format default value = '%s_seq'
$dbconfigoption['seqname_format'] = '%s_seq';

// portability default value = 0
$dbconfigoption['portability'] = 0;

// ssl default value = false
$dbconfigoption['ssl'] = false;

$host_name = $dbconfig['db_hostname'];

$site_URL = 'http://localhost/vtiger-ru-fork/trunk/rucrm';

// root directory path
$root_directory = '/var/www/vtiger-ru-fork/trunk/rucrm/';

// cache direcory path
$cache_dir = 'cache/';

// tmp_dir default value prepended by cache_dir = images/
$tmp_dir = 'cache/images/';

// import_dir default value prepended by cache_dir = import/
$import_dir = 'cache/import/';

// upload_dir default value prepended by cache_dir = upload/
$upload_dir = 'cache/upload/';

// maximum file size for uploaded files in bytes also used when uploading import files
// upload_maxsize default value = 3000000
$upload_maxsize = 30000000;

// flag to allow export functionality
// 'all' to allow anyone to use exports 
// 'admin' to only allow admins to export 
// 'none' to block exports completely 
// allow_exports default value = all
$allow_exports = 'all';

// files with one of these extensions will have '.txt' appended to their filename on upload
// upload_badext default value = php, php3, php4, php5, pl, cgi, py, asp, cfm, js, vbs, html, htm
$upload_badext = array('php', 'php3', 'php4', 'php5', 'pl', 'cgi', 'py', 'asp', 'cfm', 'js', 'vbs', 'html', 'htm', 'exe', 'bin', 'bat', 'sh', 'dll', 'phps');

// full path to include directory including the trailing slash
// includeDirectory default value = $root_directory..'include/
$includeDirectory = $root_directory.'include/';

// list_max_entries_per_page default value = 20
$list_max_entries_per_page = '20';

// limitpage_navigation default value = 5
$limitpage_navigation = '5';

// history_max_viewed default value = 5
$history_max_viewed = '5';

// default_module default value = Home
$default_module = 'Home';

// default_action default value = index
$default_action = 'index';

// set default theme
// default_theme default value = blue
$default_theme = 'softed';

// show or hide time to compose each page
// calculate_response_time default value = true
$calculate_response_time = true;

// default text that is placed initially in the login form for user name
// no default_user_name default value
$default_user_name = '';

// default text that is placed initially in the login form for password
// no default_password default value
$default_password = '';

// create user with default username and password
// create_default_user default value = false
$create_default_user = false;
// default_user_is_admin default value = false
$default_user_is_admin = false;

// if your MySQL/PHP configuration does not support persistent connections set this to true to avoid a large performance slowdown
// disable_persistent_connections default value = false
$disable_persistent_connections = false;

//Master currency name
$currency_name = 'Russia, Rubles';

// default charset
// default charset default value = 'UTF-8' or 'ISO-8859-1'
$default_charset = 'UTF-8';

// default language
// default_language default value = en_us
$default_language = 'ru_ru';

// add the language pack name to every translation string in the display.
// translation_string_prefix default value = false
$translation_string_prefix = false;

//Option to cache tabs permissions for speed.
$cache_tab_perms = true;

//Option to hide empty home blocks if no entries.
$display_empty_home_blocks = false;

//Disable Stat Tracking of vtiger CRM instance
$disable_stats_tracking = false;

// Generating Unique Application Key
$application_unique_key = 'e42d5df399ada17911704c6f3d1c3617';

// trim descriptions, titles in listviews to this value
$listview_max_textlength = 40;

// Maximum time limit for PHP script execution (in seconds)
$php_max_execution_time = 0;

// Set the default timezone as per your preference
$default_timezone = 'Europe/Kiev';

/** If timezone is configured, try to set it */
if(isset($default_timezone) && function_exists('date_default_timezone_set')) {
	@date_default_timezone_set($default_timezone);
}

?>