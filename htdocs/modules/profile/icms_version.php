<?php
/**
 * Extended User Profile
 *
 * This file holds the configuration information of this module
 *
 * @copyright       The ImpressCMS Project http://www.impresscms.org/
 * @license         LICENSE.txt
 * @license			GNU General Public License (GPL) http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package         modules
 * @since           1.2
 * @author          Jan Pedersen
 * @author          Marcello Brandao <marcello.brandao@gmail.com>
 * @author	   		Sina Asghari (aka stranger) <pesian_stranger@users.sourceforge.net>
 * @version         $Id$
 */

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

/**  General Information  */
$modversion = array(
	'name'=> _PROFILE_MI_NAME,
	'version'=> 1.2,
	'description'=> _PROFILE_MI_DESC,
	'author'=> "Jan Pedersen, Marcello Brandao, Sina Asghari.",
	'credits'=> "The XOOPS Project, The ImpressCMS Project, The SmartFactory, Ackbarr, Komeia, vaughan, alfred.",
	'help'=> "",
	'license'=> "GNU General Public License (GPL)",
	'official'=> 0,
	'dirname'=> basename( dirname( __FILE__ ) ),
	'modname' => 'profile',

/**  Images information  */
	'iconsmall'=> "images/icon_small.png",
	'iconbig'=> "images/icon_big.png",
	'image'=> "images/icon_big.png", /* for backward compatibility */

/**  Development information */
	'status_version'=> "RC",
	'status'=> "RC",
	'date'=> "",
	'author_word'=> "",

/** Contributors */
  'developer_website_url' => "http://www.impresscms.org",
	'developer_website_name' => "ImpressCMS Core & Module developpers",
	'developer_email' => "contact@impresscms.org",

/** Database information */
	'sqlfile' => array('mysql' => 'sql/mysql.sql'),
  	'tables' => array( 
	'0' => 'profile_images',
	'1' => 'profile_friendship',
	'2' => 'profile_visitors',
	'3' => 'profile_video',
	'4' => 'profile_friendpetition',
	'5' => 'profile_tribes',
	'6' => 'profile_reltribeuser',
	'7' => 'profile_scraps',
	'8' => 'profile_configs',
	'9' => 'profile_suspensions',
	'10' => 'profile_audio',
	'11' => 'profile_category',
	'12' => 'profile_profile',
	'13' => 'profile_field',
	'14' => 'profile_visibility',
	'15' => 'profile_regstep') );

$modversion['people']['developers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=168]marcan[/url] (Marc-Andr&eacute; Lanciault)";
$modversion['people']['developers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=392]stranger[/url] (Sina Asghari)";
$modversion['people']['developers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=69]vaughan[/url]";
$modversion['people']['developers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=54]skenow[/url]";
$modversion['people']['developers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=10]sato-san[/url]";
$modversion['people']['testers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=53]davidl2[/url]";
$modversion['people']['testers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=340]nekro[/url]";
$modversion['people']['testers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=392]stranger[/url] (Sina Asghari)";
$modversion['people']['testers'][] = "[url=http://community.impresscms.org/userinfo.php?uid=10]sato-san[/url]";
$modversion['people']['translators'][] = "";
$modversion['people']['documenters'][] = "[url=http://community.impresscms.org/userinfo.php?uid=372]UnderDog[/url]";
//$modversion['people']['other'][] = "";

/** Manual */
$modversion['manual']['wiki'][] = "<a href='http://wiki.impresscms.org/index.php?title=Extended_Profile/"._LANGCODE."' target='_blank'>"._LANGNAME."</a>";

$modversion['warning'] = _CO_ICMS_WARNING_RC;

/** Administrative information */
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/admin.php";
$modversion['adminmenu'] = "admin/menu.php";

/** Install and update informations */
$modversion['onInstall'] = "include/oninstall.inc.php";
$modversion['onUpdate'] = "include/onupdate.inc.php";

/** Search information */
$modversion['hasSearch'] = 0;
$modversion['search'] = array (
  'file' => "include/search.inc.php",
  'func' => "profile_search");

/** Menu information */
$modversion['hasMain'] = 1;

$i = 1;
global $xoopsModule, $xoopsUser;
if (is_object($xoopsModule) && $xoopsModule->dirname() == $modversion['dirname']) {
$mod_handler =& xoops_gethandler('module');
$mod_profile =& $mod_handler->getByDirname(basename( dirname( __FILE__ ) ));
$conf_handler =& xoops_gethandler('config');
$moduleConfig =& $conf_handler->getConfigsByCat(0, $mod_profile->getVar('mid'));
$modversion['sub'][$i]['name'] = _MI_PROFILE_SEARCH;
$modversion['sub'][$i]['url'] = ($moduleConfig['profile_social']? 'searchmembers.php':'search.php');
  if ($xoopsUser) {
  $i++;
      $modversion['sub'][$i]['name'] = _MI_PROFILE_MYPROFILE;
      $modversion['sub'][$i]['url'] = $moduleConfig['profile_social']? 'index.php':'userinfo.php';
  $i++;
      $modversion['sub'][$i]['name'] = _PROFILE_MI_EDITACCOUNT;
      $modversion['sub'][$i]['url'] = "edituser.php";
  $i++;
      $modversion['sub'][$i]['name'] = _PROFILE_MI_CHANGEPASS;
      $modversion['sub'][$i]['url'] = "changepass.php";
    if (isset($moduleConfig) && isset($moduleConfig['allow_chgmail']) && $moduleConfig['allow_chgmail'] == 1) {
  $i++;
        $modversion['sub'][$i]['name'] = _PROFILE_MI_CHANGEMAIL;
        $modversion['sub'][$i]['url'] = "changemail.php";
    }
    if($moduleConfig['profile_social']==1){
	  if ($moduleConfig['enable_scraps']==1){ 
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYSCRAPS;
        $modversion['sub'][$i]['url'] = "scrapbook.php";
      }
	  if ($moduleConfig['enable_pictures']==1){
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYPICTURES;
        $modversion['sub'][$i]['url'] = "album.php";
      }
      if ($moduleConfig['enable_audio']==1){
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYAUDIOS;
        $modversion['sub'][$i]['url'] = "audio.php";
      }
      if ($moduleConfig['enable_videos']==1){ 
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYVIDEOS;
        $modversion['sub'][$i]['url'] = "video.php";
      }
      if ($moduleConfig['enable_friends']==1){ 
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYFRIENDS;
        $modversion['sub'][$i]['url'] = "friends.php";
      }
      if ($moduleConfig['enable_tribes']==1){ 
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYTRIBES;
        $modversion['sub'][$i]['url'] = "tribes.php";
      }
  $i++;
        $modversion['sub'][$i]['name'] = _MI_PROFILE_MYCONFIGS;
  		$modversion['sub'][$i]['url'] = "configs.php";
  	}
  }
}

/** Blocks information */
$modversion['blocks'][1] = array(
  'file' => 'blocks.php',
  'name' => _MI_PROFILE_FRIENDS,
  'description' => _MI_PROFILE_FRIENDS_DESC,
  'show_func' => 'b_profile_friends_show',
  'edit_func' => 'b_profile_friends_edit',
  'options' => '5',
  'template' => 'profile_block_friends.html');

$modversion['blocks'][] = array(
  'file' => 'blocks.php',
  'name' => _MI_PROFILE_LAST,
  'description' => _MI_PROFILE_LAST_DESC,
  'show_func' => 'b_profile_lastpictures_show',
  'edit_func' => 'b_profile_lastpictures_edit',
  'options' => '5',
  'template' => 'profile_block_lastpictures.html');

/** Templates information */
$modversion['templates'][1] = array(
  'file' => 'profile_navbar.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_index.html',
  'description' => '');

$modversion['templates'][]= array(
  'file' => 'profile_friends.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_scrapbook.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_audio.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_header.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_tribes.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_configs.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_footer.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_edittribe.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_tribes_results.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_tribe.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_searchform.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_searchresults.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_search.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_results.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_album.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_notifications.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_fans.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_video.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_noindex.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_editprofile.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_profileform.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_admin_fieldlist.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_userinfo.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_admin_categorylist.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_admin_visibility.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_admin_steplist.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_register.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_register.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_changepass.html',
  'description' => '');

$modversion['templates'][] = array(
  'file' => 'profile_report.html',
  'description' => '');

/** Preferences categories */
$modversion['configcat'][1] = array(
  'nameid' => 'settings',
  'name' => '_PROFILE_MI_CAT_USER',
  'description' => '_PROFILE_MI_CAT_SETTINGS_DSC');

$modversion['configcat'][] = array(
  'nameid' => 'user',
  'name' => '_PROFILE_MI_CAT_USER',
  'description' => '_PROFILE_MI_CAT_USER_DSC');

// Config categories
$modversion['configcat'][1]['nameid'] = 'settings';
$modversion['configcat'][1]['name'] = '_PROFILE_MI_CAT_SETTINGS';
$modversion['configcat'][1]['description'] = '_PROFILE_MI_CAT_SETTINGS_DSC';

$modversion['configcat'][2]['nameid'] = 'user';
$modversion['configcat'][2]['name'] = '_PROFILE_MI_CAT_USER';
$modversion['configcat'][2]['description'] = '_PROFILE_MI_CAT_USER_DSC';
/** Preferences information */

$i = 1;
$modversion['config'][$i]['name'] = 'profile_social';
$modversion['config'][$i]['title'] = '_PROFILE_MI_PROFILE_SOCIAL';
$modversion['config'][$i]['description'] = '_PROFILE_MI_PROFILE_SOCIAL_DESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;

$i++;
$modversion['config'][$i]['name'] = 'profile_search';
$modversion['config'][$i]['title'] = '_PROFILE_MI_PROFILE_SEARCH';
$modversion['config'][$i]['description'] = '_PROFILE_MI_PROFILE_SEARCH_DSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['category'] = 'settings';

$i++;
$modversion['config'][$i]['name'] = 'show_empty';
$modversion['config'][$i]['title'] = '_PROFILE_MI_SHOWEMPTY';
$modversion['config'][$i]['description'] = '_PROFILE_MI_SHOWEMPTY_DESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$modversion['config'][$i]['category'] = 'settings';
/*
$i++;
$modversion['config'][$i]['name'] = 'perpage';
$modversion['config'][$i]['title'] = '_MI_SPROFILE_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_SPROFILE_PERPAGE_DSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '5';
$modversion['config'][$i]['category'] = 'settings';
$modversion['config'][$i]['options'] = array(5  => '5',
										10  => '10',
										15  => '15',
                                   		25   => '25',
                                   		50  => '50',
                                   		100   => '100',
                                  		 _MI_SPROFILE_ALL => 'all');*/
//real name disp
$i++;
$modversion['config'][$i]['name'] = 'index_real_name';
$modversion['config'][$i]['title'] = '_PROFILE_MI_DISPNAME';
$modversion['config'][$i]['description'] = '_PROFILE_MI_DISPNAME_DESC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'nick';
$modversion['config'][$i]['category'] = 'settings';
$modversion['config'][$i]['options'] = array(_PROFILE_MI_NICKNAME  => 'nick',
										_PROFILE_MI_REALNAME  => 'real',
										_PROFILE_MI_BOTH  => 'both');

//avatar disp
$i++;
$modversion['config'][$i]['name'] = 'index_avatar';
$modversion['config'][$i]['title'] = '_PROFILE_MI_AVATAR_INDEX';
$modversion['config'][$i]['description'] = '_PROFILE_MI_AVATAR_INDEX_DESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['category'] = 'settings';

//avatar height
$i++;
$modversion['config'][$i]['name'] = 'index_avatar_height';
$modversion['config'][$i]['title'] = '_PROFILE_MI_AVATAR_HEIGHT';
$modversion['config'][$i]['description'] = '_PROFILE_MI_AVATAR_HEIGHT_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$modversion['config'][$i]['category'] = 'settings';

//avatar width
$i++;
$modversion['config'][$i]['name'] = 'index_avatar_width';
$modversion['config'][$i]['title'] = '_PROFILE_MI_AVATAR_WIDTH';
$modversion['config'][$i]['description'] = '_PROFILE_MI_AVATAR_WIDTH_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$modversion['config'][$i]['category'] = 'settings';

$member_handler = &xoops_gethandler('member');
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('groupid', 3, '!='));
$group_list = &$member_handler->getGroupList($criteria);

foreach ($group_list as $key=>$group) {
	$groups[$group] = $key;
}

$i++;
$modversion['config'][$i]['name'] = 'view_group_3';
$modversion['config'][$i]['title'] = '_PROFILE_MI_GROUP_VIEW_3';
$modversion['config'][$i]['description'] = '_PROFILE_MI_GROUP_VIEW_DSC';
$modversion['config'][$i]['formtype'] = 'select_multi';
$modversion['config'][$i]['valuetype'] = 'array';
$modversion['config'][$i]['options'] = $groups;
$modversion['config'][$i]['default'] = $groups;
$modversion['config'][$i]['category'] = 'other';

$i++;
$modversion['config'][$i]['name'] = 'view_group_2';
$modversion['config'][$i]['title'] = '_PROFILE_MI_GROUP_VIEW_2';
$modversion['config'][$i]['description'] = '_PROFILE_MI_GROUP_VIEW_DSC';
$modversion['config'][$i]['formtype'] = 'select_multi';
$modversion['config'][$i]['valuetype'] = 'array';
$modversion['config'][$i]['options'] = $groups;
$modversion['config'][$i]['default'] = $groups;
$modversion['config'][$i]['category'] = 'other';

foreach ($groups as $groupid) {
	if($groupid > 3){
		$i++;
		$modversion['config'][$i]['name'] = 'view_group_'.$groupid;
		$modversion['config'][$i]['title'] = '_PROFILE_MI_GROUP_VIEW_'.$groupid;
		$modversion['config'][$i]['description'] = '_PROFILE_MI_GROUP_VIEW_DSC';
		$modversion['config'][$i]['formtype'] = 'select_multi';
		$modversion['config'][$i]['valuetype'] = 'array';
		$modversion['config'][$i]['options'] = $groups;
		$modversion['config'][$i]['default'] = $groups;
		$modversion['config'][$i]['category'] = 'other';
	}
}
$i++;
$modversion['config'][$i]['name'] = 'enable_pictures';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ENABLEPICT_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ENABLEPICT_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'nb_pict';
$modversion['config'][$i]['title'] = '_MI_PROFILE_NUMBPICT_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_NUMBPICT_DESC';
$modversion['config'][$i]['default'] = 12;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
/*
$modversion['config'][$i]['name'] = 'path_upload';
$modversion['config'][$i]['title'] = '_MI_PROFILE_PATHUPLOAD_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_PATHUPLOAD_DESC';
$modversion['config'][$i]['default'] = XOOPS_ROOT_PATH."/uploads/";
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$i++;
$modversion['config'][$i]['name'] = 'link_path_upload';
$modversion['config'][$i]['title'] = '_MI_PROFILE_LINKPATHUPLOAD_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_LINKPATHUPLOAD_DESC';
$modversion['config'][$i]['default'] = XOOPS_UPLOAD_URL;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$i++;*/
$modversion['config'][$i]['name'] = 'thumb_width';
$modversion['config'][$i]['title'] = '_MI_PROFILE_THUMW_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_THUMBW_DESC';
$modversion['config'][$i]['default'] = 125;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'thumb_height';
$modversion['config'][$i]['title'] = '_MI_PROFILE_THUMBH_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_THUMBH_DESC';
$modversion['config'][$i]['default'] = 175;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'resized_width';
$modversion['config'][$i]['title'] = '_MI_PROFILE_RESIZEDW_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_RESIZEDW_DESC';
$modversion['config'][$i]['default'] = 650;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'resized_height';
$modversion['config'][$i]['title'] = '_MI_PROFILE_RESIZEDH_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_RESIZEDH_DESC';
$modversion['config'][$i]['default'] = 450;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'max_original_width';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ORIGINALW_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ORIGINALW_DESC';
$modversion['config'][$i]['default'] = 2048;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'max_original_height';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ORIGINALH_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ORIGINALH_DESC';
$modversion['config'][$i]['default'] = 1600;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'maxfilesize';
$modversion['config'][$i]['title'] = '_MI_PROFILE_MAXFILEBYTES_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_MAXFILEBYTES_DESC';
$modversion['config'][$i]['default'] = 512000;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'picturesperpage';
$modversion['config'][$i]['title'] = '_MI_PROFILE_PICTURESPERPAGE_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_PICTURESPERPAGE_DESC';
$modversion['config'][$i]['default'] = 6;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'physical_delete';
$modversion['config'][$i]['title'] = '_MI_PROFILE_DELETEPHYSICAL_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_DELETEPHYSICAL_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'images_order';
$modversion['config'][$i]['title'] = '_MI_PROFILE_IMGORDER_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_IMGORDER_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'enable_friends';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ENABLEFRIENDS_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ENABLEFRIENDS_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'friendsperpage';
$modversion['config'][$i]['title'] = '_MI_PROFILE_FRIENDSPERPAGE_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_FRIENDSPERPAGE_DESC';
$modversion['config'][$i]['default'] = 12;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'enable_audio';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ENABLEAUDIO_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ENABLEAUDIO_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'nb_audio';
$modversion['config'][$i]['title'] = '_MI_PROFILE_NUMBAUDIO_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_NUMBAUDIO_DESC';
$modversion['config'][$i]['default'] = 12;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'audiosperpage';
$modversion['config'][$i]['title'] = '_MI_PROFILE_AUDIOSPERPAGE_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_AUDIOSPERPAGE_DESC';
$modversion['config'][$i]['default'] = 20;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'enable_videos';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ENABLEVIDEOS_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ENABLEVIDEOS_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'videosperpage';
$modversion['config'][$i]['title'] = '_MI_PROFILE_VIDEOSPERPAGE_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_VIDEOSPERPAGE_DESC';
$modversion['config'][$i]['default'] = 6;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;


$modversion['config'][$i]['name'] = 'width_tube';
$modversion['config'][$i]['title'] = '_MI_PROFILE_TUBEW_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_TUBEW_DESC';
$modversion['config'][$i]['default'] = 450;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'height_tube';
$modversion['config'][$i]['title'] = '_MI_PROFILE_TUBEH_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_TUBEH_DESC';
$modversion['config'][$i]['default'] = 350;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'width_maintube';
$modversion['config'][$i]['title'] = '_MI_PROFILE_MAINTUBEW_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_MAINTUBEW_DESC';
$modversion['config'][$i]['default'] = 250;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'height_maintube';
$modversion['config'][$i]['title'] = '_MI_PROFILE_MAINTUBEH_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_MAINTUBEH_DESC';
$modversion['config'][$i]['default'] = 210;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'enable_tribes';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ENABLETRIBES_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ENABLETRIBES_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'tribesperpage';
$modversion['config'][$i]['title'] = '_MI_PROFILE_TRIBESPERPAGE_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_TRIBESPERPAGE_DESC';
$modversion['config'][$i]['default'] = 6;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'enable_scraps';
$modversion['config'][$i]['title'] = '_MI_PROFILE_ENABLESCRAPS_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_ENABLESCRAPS_DESC';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$i++;
$modversion['config'][$i]['name'] = 'scrapsperpage';
$modversion['config'][$i]['title'] = '_MI_PROFILE_SCRAPSPERPAGE_TITLE';
$modversion['config'][$i]['description'] = '_MI_PROFILE_SCRAPSPERPAGE_DESC';
$modversion['config'][$i]['default'] = 20;
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';



/** Comments information */
$modversion['hasComments'] = 1;

$modversion['comments'] = array(
  'itemName' => 'tribe_id',
  'pageName' => 'tribe.php'
    );

/** Notification information */
$modversion['hasNotification'] = 1;

$modversion['notification'] = array (
  'lookup_file' => 'include/notification.inc.php',
  'lookup_func' => 'profile_iteminfo');

$modversion['notification']['category'][1] = array (
  'name' => 'picture',
  'title' => _MI_PROFILE_PICTURE_NOTIFYTIT,
  'description' => _MI_PROFILE_PICTURE_NOTIFYDSC,
  'subscribe_from' => 'album.php',
  'item_name' => 'uid',
  'allow_bookmark' => 1 );

$modversion['notification']['event'][1] = array(
  'name' => 'new_picture',
  'category'=> 'picture',
  'title'=> _MI_PROFILE_PICTURE_NEWPIC_NOTIFY,
  'caption'=> _MI_PROFILE_PICTURE_NEWPIC_NOTIFYCAP,
  'description'=> _MI_PROFILE_PICTURE_NEWPOST_NOTIFYDSC,
  'mail_template'=> 'picture_newpic_notify',
  'mail_subject'=> _MI_PROFILE_PICTURE_NEWPIC_NOTIFYSBJ);

$modversion['notification']['category'][2] = array (
  'name' => 'video',
  'title' => _MI_PROFILE_VIDEO_NOTIFYTIT,
  'description' => _MI_PROFILE_VIDEO_NOTIFYDSC,
  'subscribe_from' => 'video.php',
  'item_name' => 'uid',
  'allow_bookmark' => 1 );

$modversion['notification']['event'][2] = array(
  'name' => 'new_video',
  'category'=> 'video',
  'title'=> _MI_PROFILE_VIDEO_NEWVIDEO_NOTIFY,
  'caption'=> _MI_PROFILE_VIDEO_NEWVIDEO_NOTIFYCAP,
  'description'=> _MI_PROFILE_VIDEO_NEWVIDEO_NOTIFYDSC,
  'mail_template'=> 'video_newvideo_notify',
  'mail_subject'=> _MI_PROFILE_VIDEO_NEWVIDEO_NOTIFYSBJ);

$modversion['notification']['category'][3] = array (
  'name' => 'scrap',
  'title' => _MI_PROFILE_SCRAP_NOTIFYTIT,
  'description' => _MI_PROFILE_SCRAP_NOTIFYDSC,
  'subscribe_from' => 'scrapbook.php',
  'item_name' => 'uid',
  'allow_bookmark' => 1 );

$modversion['notification']['event'][3] = array(
  'name' => 'new_scrap',
  'category'=> 'scrap',
  'title'=> _MI_PROFILE_SCRAP_NEWSCRAP_NOTIFY,
  'caption'=> _MI_PROFILE_SCRAP_NEWSCRAP_NOTIFYCAP,
  'description'=> _MI_PROFILE_SCRAP_NEWSCRAP_NOTIFYDSC,
  'mail_template'=> 'scrap_newscrap_notify',
  'mail_subject'=> _MI_PROFILE_SCRAP_NEWSCRAP_NOTIFYSBJ);

$modversion['notification']['category'][4] = array (
  'name' => 'friendship',
  'title' => _MI_PROFILE_FRIENDSHIP_NOTIFYTIT,
  'description' => _MI_PROFILE_FRIENDSHIP_NOTIFYDSC,
  'subscribe_from' => 'friends.php',
  'item_name' => 'uid',
  'allow_bookmark' => 0 );

$modversion['notification']['event'][4] = array(
  'name' => 'new_friendship',
  'category'=> 'friendship',
  'title'=> _MI_PROFILE_FRIEND_NEWPETITION_NOTIFY,
  'caption'=> _MI_PROFILE_FRIEND_NEWPETITION_NOTIFYCAP,
  'description'=> _MI_PROFILE_FRIEND_NEWPETITION_NOTIFYDSC,
  'mail_template'=> 'friendship_newpetition_notify',
  'mail_subject'=> _MI_PROFILE_FRIEND_NEWPETITION_NOTIFYSBJ);

icms_mkdir(ICMS_ROOT_PATH.'/uploads/'.basename( dirname( __FILE__ ) ).'/mp3');
?>