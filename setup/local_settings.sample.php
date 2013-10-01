<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Some re-usable paths and urls
-----------------------------------------------------------------------*/
$server_path = $_SERVER['DOCUMENT_ROOT'];
$site_url = 'http://'.$_SERVER['SERVER_NAME'];


/* Database overwrites
-------------------------------------------------------------------*/
if ( !empty($db) && is_array($db) )
{
    $db['expressionengine']['hostname'] = "127.0.0.1";
    $db['expressionengine']['username'] = "root";
    $db['expressionengine']['password'] = "";
    $db['expressionengine']['database'] = "";
    $db['expressionengine']['cachedir'] = $server_path."/../system/expressionengine/cache/db_cache/";
}


/* Config overwrites
-------------------------------------------------------------------*/
if ( !empty($config) && is_array($config) )
{
    $config['site_url'] = $site_url.'/';
    $config['cp_url'] = $site_url.'/manage/index.php';
    $config['base_url'] = $site_url.'/';

    $config['theme_folder_url'] = $site_url.'/themes/';
    $config['theme_folder_path'] = $server_path.'/themes/';

    $config['tmpl_file_basepath'] = $server_path.'/../templates/';

    $config['avatar_url'] = $site_url.'/media/system/avatars/';
    $config['avatar_path'] = $server_path.'/media/system/avatars/';
    $config['photo_url'] = $site_url.'/media/system/member_photos/';
    $config['photo_path'] = $server_path.'/media/system/member_photos/';
    $config['sig_img_url'] = $site_url.'/media/system/signature_attachments/';
    $config['sig_img_path'] = $server_path.'/media/system/sig_img_path/';
    $config['prv_msg_upload_url'] = $site_url.'/media/system/pm_attachments/';
    $config['prv_msg_upload_path'] = $server_path.'/media/system/pm_attachments/';
    $config['captcha_url'] = $site_url.'/media/system/captchas/';
    $config['captcha_path'] = $server_path.'/media/system/captchas/';
    $config['emoticon_url'] = $site_url.'/media/system/smileys/';
    $config['emoticon_path'] = $server_path.'/media/system/smileys/';

    $config['cache_path'] = $server_path.'/../system/expressionengine/cache/';
}


/* Disable Minimee
-------------------------------------------------------------------*/

$config['minimee'] = array(
    'disable'           => 'yes',
);


/* index.php overwrites
-------------------------------------------------------------------*/
if (!empty($assign_to_config) && is_array($assign_to_config))
{
    $debug = 1;

    // Per multi site settings
    switch ($assign_to_config['site_name'])
    {
        // Default site config settings
        default:
            $assign_to_config['site_url'] = $site_url;
            break;
    }

}