<?php
if ( ! defined('FIELD_EDITOR_VERSION'))
{
	define('FIELD_EDITOR_VERSION', '1.0.4');
}

if (defined('PATH_THEMES'))
{
	if ( ! defined('PATH_THIRD_THEMES'))
	{
		define('PATH_THIRD_THEMES', PATH_THEMES.'third_party/');
	}
	
	if ( ! defined('URL_THIRD_THEMES'))
	{
		define('URL_THIRD_THEMES', get_instance()->config->slash_item('theme_folder_url').'third_party/');
	}
}

$config['name'] = 'Field Editor';
$config['version'] = FIELD_EDITOR_VERSION;
$config['nsm_addon_updater']['versions_xml'] = 'http://mightybigrobot.com/products/version/field-editor';