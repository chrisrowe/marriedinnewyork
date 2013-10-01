<?php
/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2003 - 2012, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 */

/*
 * --------------------------------------------------------------------
 *  System Path
 * --------------------------------------------------------------------
 *
 * The following variable contains the server path to your
 * ExpressionEngine "system" folder.  By default the folder is named
 * "system" but it can be renamed or moved for increased security.
 * Indicate the new name and/or path here. The path can be relative
 * or it can be a full server path.
 *
 * http://expressionengine.com/user_guide/installation/best_practices.html
 *
 */
	$system_path = '../system';


/*
 * --------------------------------------------------------------------
 *  Multiple Site Manager
 * --------------------------------------------------------------------
 *
 * Uncomment the following variables if you are using the Multiple
 * Site Manager: http://expressionengine.com/user_guide/cp/sites
 *
 * Set the Short Name of the site this file will display, the URL of
 * this site's admin.php file, and the main URL of the site (without
 * index.php)
 *
 */
//	$assign_to_config['site_name']  = 'domain2_short_name';
//	$assign_to_config['cp_url'] = 'http://domain2.com/admin.php';
//	$assign_to_config['site_url'] = 'http://domain2.com';


/*
 * --------------------------------------------------------------------
 *  Error Reporting
 * --------------------------------------------------------------------
 *
 * PHP and database errors are normally displayed dynamically based
 * on the authorization level of each user accessing your site.
 * This variable allows the error reporting system to be overridden,
 * which can be useful for low level debugging during site development,
 * since errors happening before a user is authenticated will not normally
 * be shown.  Options:
 *
 *	$debug = 0;  Default setting. Errors shown based on authorization level
 *
 *	$debug = 1;  All errors shown regardless of authorization
 *
 * NOTE: Enabling this override can have security implications.
 * Enable it only if you have a good reason to.
 *
 */
	$debug = 0;

/*
 * --------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * --------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class. This allows you to set custom config items or override
 * any default config values found in the config.php file.  This can
 * be handy as it permits you to share one application between more then
 * one front controller file, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 *
 * NOTE: This feature can be used to run multiple EE "sites" using
 * the old style method.  Instead of individual variables you'll
 * set array indexes corresponding to them.
 *
 */
//	$assign_to_config['template_group'] = '';
//	$assign_to_config['template'] = '';
//	$assign_to_config['site_index'] = '';
//	$assign_to_config['site_404'] = '';
//	$assign_to_config['global_vars'] = array(); // This array must be associative

	$uri = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $global_vars = array();

    /* PATHS */
    $global_vars['gv_site_url']         = "";
    $global_vars['gv_static_url']       = "/static";

    /* GENERAL */
    $global_vars['gv_all_segments']     = $uri;

    /* DISABLE PARAMETER */
    $global_vars['gv_disable_default']  = 'categories|member_data|pagination';
    $global_vars['gv_disable_titles']   = 'categories|custom_fields|member_data|pagination';

    /* DATE FORMATTING */
    $global_vars['gv_date_short']       = '%F %d, %Y';
    $global_vars['gv_date_time']        = '%g:%i %a';
    $global_vars['gv_date_full']        = '%F %d %Y, %g:%i %a';

    /* PAGE TYPES */
    $global_vars['gv_pagination_page']  = (preg_match("#^P(\d+)|/P(\d+)#", $uri)) ? 'yes' : 'no';

    /* DATES IN URLS */
    $global_vars['gv_day_segment']      = getDateFromURI($uri, 'day');
    $global_vars['gv_month_segment']    = getDateFromURI($uri, 'month');
    $global_vars['gv_year_segment']     = getDateFromURI($uri, 'year');

    /* NOW ASSIGN THAT TO GLOBAL VARS IN EE2 */
    $assign_to_config['site_name'] = 'default_site';
    $assign_to_config['global_vars'] = $global_vars;

/*
* --------------------------------------------------------------------
* SUPPORTING FUNCTIONS
* --------------------------------------------------------------------
*/

    /* http://loweblog.com/freelance/article/last-segment-a-global-variable/ */
    function getLastSegment($uri)
    {
        if (!strlen($uri)) return '';

        if (substr($uri,-1,1) == '/') $uri = substr($uri,0,-1);

        return substr($uri,(strrpos($uri, '/')+1));
    }

    function getDateFromURI($uri, $get = 'year')
    {
        $year   = "";
        $month  = "";
        $day    = "";

        // do we match year/month/date (2009/04/27)
        if (preg_match("#(^|\/)(\d{4}/\d{2}/\d{2})(\/|$)#", $uri, $match))
        {
            $ex = explode('/', $match[2]);

            $year   = $ex[0];
            $month  = $ex[1];
            $day    = $ex[2];

        } // or do we match year/month (2009/04)
        elseif (preg_match("#(^|\/)(\d{4}/\d{2})(\/|$)#", $uri, $match))
        {
            $ex = explode('/', $match[2]);

            $year   = $ex[0];
            $month  = $ex[1];

        } // or do we match just year (2009)
        elseif (preg_match("#(^|\/)(\d{4})(\/|$)#", $uri, $match))
        {
            $ex = explode('/', $match[2]);

            $year	= $ex[0];

        }

        switch($get) {
            case "day":
                return $day;
                break;
            case "month":
                return $month;
                break;
            default:
                return $year;
        }
    }

/*
 * --------------------------------------------------------------------
 *  END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
 * --------------------------------------------------------------------
 */


/*
 * ---------------------------------------------------------------
 *  Disable all routing, send everything to the frontend
 * ---------------------------------------------------------------
 */
	$routing['directory'] = '';
	$routing['controller'] = 'ee';
	$routing['function'] = 'index';

/*
 * --------------------------------------------------------------------
 *  Mandatory config overrides
 * --------------------------------------------------------------------
 */
	$assign_to_config['subclass_prefix'] = 'EE_';

/*
 * --------------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * --------------------------------------------------------------------
 */

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the sytsem path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * --------------------------------------------------------------------
 *  Now that we know the path, set the main constants
 * --------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	define('EXT', '.php');

 	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path.'codeigniter/system/'));

	// Path to the "application" folder
	define('APPPATH', $system_path.'expressionengine/');

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(str_replace("\\", "/", $system_path), '/'), '/'), '/'));

    /* Use local settings
    --------------------------------------------------------------------*/
    $app_path = substr(APPPATH, -10, -9) == 'installer'
        ? rtrim(APPPATH, 'installer/').'/expressionengine/'
        : APPPATH;
    $local_settings = $app_path.'config/local_settings.php';
    if (file_exists($local_settings)) include($local_settings);

	// The $debug value as a constant for global access
	define('DEBUG', $debug);  unset($debug);

/*
 * --------------------------------------------------------------------
 *  Set the error reporting level
 * --------------------------------------------------------------------
 */
	if (DEBUG == 1)
	{
		error_reporting(E_ALL);
		@ini_set('display_errors', 1);
	}
	else
	{
		error_reporting(0);
	}

/*
 *---------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 *---------------------------------------------------------------
 *
 * And away we go...
 *
 */
	require_once BASEPATH.'core/CodeIgniter'.EXT;

/* End of file index.php */
/* Location: ./index.php */
