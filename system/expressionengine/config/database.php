<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$server_path = $_SERVER['DOCUMENT_ROOT'];

$active_group = 'expressionengine';
$active_record = TRUE;

$db['expressionengine']['hostname'] = "127.0.0.1";
$db['expressionengine']['username'] = "root";
$db['expressionengine']['password'] = "";
$db['expressionengine']['database'] = "jumpstart";
$db['expressionengine']['dbdriver'] = "mysql";
$db['expressionengine']['dbprefix'] = "exp_";
$db['expressionengine']['pconnect'] = FALSE;
$db['expressionengine']['swap_pre'] = "exp_";
$db['expressionengine']['db_debug'] = TRUE;
$db['expressionengine']['cache_on'] = FALSE;
$db['expressionengine']['autoinit'] = FALSE;
$db['expressionengine']['char_set'] = "utf8";
$db['expressionengine']['dbcollat'] = "utf8_general_ci";
$db['expressionengine']['cachedir'] = $server_path."manage/expressionengine/cache/db_cache/";

/* Use local settings
--------------------------------------------------------------------*/
$app_path = substr(APPPATH, -10, -9) == 'installer'
    ? rtrim(APPPATH, 'installer/').'/expressionengine/'
    : APPPATH;
$local_settings = $app_path.'config/local_settings.php';
if (file_exists($local_settings)) include($local_settings);

/* End of file database.php */
/* Location: ./system/expressionengine/config/database.php */
