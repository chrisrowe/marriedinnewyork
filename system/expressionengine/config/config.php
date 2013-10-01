<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");


/* Path to root & media
-----------------------------------------------------------------------*/
$server_path = $_SERVER["DOCUMENT_ROOT"];
$site_url = 'http://'.$_SERVER['SERVER_NAME'];


/* ExpressionEngine Config Items
-------------------------------------------------------------------------- */
$config["app_version"] = "270";
$config["install_lock"] = "1";
$config["license_number"] = "";
$config["debug"] = "0";
$config["doc_url"] = "http://ellislab.com/expressionengine/user-guide/";
$config["is_system_on"] = "y";
$config["allow_extensions"] = "y";


/* General
-------------------------------------------------------------------*/
$config["site_index"] = "";
$config["site_url"] = $site_url."/";
$config["cp_url"] = $site_url."/system/index.php";

$config['uri_protocol']	= 'AUTO';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'EE_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\\-';
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = TRUE;

/* Member directory paths and urls
-------------------------------------------------------------------*/
$config["avatar_url"] = $site_url."/uploads/system/avatars/";
$config["avatar_path"] = $server_path."/uploads/system/avatars/";
$config["avatar_max_width"] = "100";
$config["avatar_max_height"] = "100";
$config["avatar_max_kb"] = "50";

$config["photo_url"] = $site_url."/uploads/system/member_photos/";
$config["photo_path"] = $server_path."/uploads/system/member_photos/";
$config["photo_max_width"] = "100";
$config["photo_max_height"] = "100";
$config["photo_max_kb"] = "50";

$config["sig_img_url"] = $site_url."/uploads/system/signature_attachments/";
$config["sig_img_path"] = $server_path."/uploads/system/signature_attachments/";
$config["sig_img_max_width"] = "480";
$config["sig_img_max_height"] = "80";
$config["sig_img_max_kb"] = "30";

$config["prv_msg_upload_path"] = $server_path."/uploads/system/pm_attachments/";


/* Misc directory paths and urls
-------------------------------------------------------------------*/
$config["theme_folder_url"] = $site_url."/themes/";
$config["theme_folder_path"] = $server_path."/themes/";

$config["captcha_url"] = $site_url."/uploads/system/captchas/";
$config["captcha_path"] = $server_path."/uploads/system/captchas/";

$config["emoticon_path"] = $server_path."/uploads/system/smileys/";
$config["enable_emoticons"] = "n";

$config["cache_path"] = $server_path."/../expressionengine/cache/";


/* Extreme traffic options - http://expressionengine.com/user_guide/general/handling_extreme_traffic.html
-------------------------------------------------------------------*/
$config["enable_online_user_tracking"] = "n";
$config["enable_hit_tracking"] = "n";
$config["enable_entry_view_tracking"] = "n";
$config["log_referrers"] = "n";
$config["dynamic_tracking_disabling"] = "";
$config["disable_all_tracking"] = "n";
$config['log_threshold'] = 0;


/* Templates Preferences
-------------------------------------------------------------------*/
$config["save_tmpl_files"] = "y";
$config["tmpl_file_basepath"] = $server_path."/../templates/";
$config["save_tmpl_revisions"] = "n";
$config["max_tmpl_revisions"] = "0";
$config["site_404"] = "404";
$config["strict_urls"] = "y";


/* Global Channel Preferences
-------------------------------------------------------------------*/
$config["use_category_name"] = "n";
$config["reserved_category_word"] = "category";
$config["word_separator"] = "dash";
$config["auto_convert_high_ascii"] = "n";


/* Member Preferences
-------------------------------------------------------------------*/
$config["profile_trigger"] = "1337@9G[14Ge6l!Wk4@8uCfXBq";


/* Cookie settings
-------------------------------------------------------------------*/
$config["cookie_path"] = "";
$config["cookie_domain"] = "";
$config["cookie_prefix"] = "";
$config["user_session_type"] = "c";
$config["admin_session_type"] = "cs";


/* Enable some hidden variables - http://expressionengine.com/user_guide/general/hidden_configuration_variables.html
-------------------------------------------------------------------*/
$config["hidden_template_indicator"] = "_";
$config["protect_javascript"] = "y";


/* File Upload Preferences
--------------------------------------------------------------------*/

$config["upload_preferences"] = array(
    1 => array(
        "name"        => "Images",
        "server_path" => $server_path."/media/uploads/images/",
        "url"         => $site_url."/media/uploads/images/"
    ),
    2 => array(
        "name"        => "Files",
        "server_path" => $server_path."/media/uploads/files/",
        "url"         => $site_url."/media/uploads/files/"
    )
);


/* CE Image Settings
--------------------------------------------------------------------*/
$config["ce_image_cache_dir"] = "/static/cache/ce-image";


/* Use local settings
--------------------------------------------------------------------*/
$app_path = substr(APPPATH, -10, -9) == 'installer'
    ? rtrim(APPPATH, 'installer/').'/expressionengine/'
    : APPPATH;
$local_settings = $app_path.'config/local_settings.php';
if (file_exists($local_settings)) include($local_settings);

/* End of file config.php */
/* Location: ./system/expressionengine/config/config.php */