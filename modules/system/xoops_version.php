<?php
// $Id: xoops_version.php 694 2006-09-04 11:33:22Z skalpa $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

$modversion['name'] = _MI_SYSTEM_NAME;
$modversion['version'] = 1.02;
$modversion['description'] = _MI_SYSTEM_DESC;
$modversion['author'] = "";
$modversion['credits'] = "The XOOPS Project";
$modversion['help'] = "system.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 1;
$modversion['image'] = "images/system_slogo.png";
$modversion['dirname'] = "system";
$modversion['iconsmall'] = "images/icon_small.png";
$modversion['iconbig'] = "images/system_big.png";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin.php";
$modversion['adminmenu'] = "menu.php";

$modversion['onUpdate'] = "include/update.php";

// Templates
$modversion['templates'][1]['file'] = 'system_imagemanager.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'system_imagemanager2.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'system_userinfo.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'system_userform.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'system_rss.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'system_redirect.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = 'system_comment.html';
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file'] = 'system_comments_flat.html';
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file'] = 'system_comments_thread.html';
$modversion['templates'][9]['description'] = '';
$modversion['templates'][10]['file'] = 'system_comments_nest.html';
$modversion['templates'][10]['description'] = '';
$modversion['templates'][11]['file'] = 'system_siteclosed.html';
$modversion['templates'][11]['description'] = '';
$modversion['templates'][12]['file'] = 'system_dummy.html';
$modversion['templates'][12]['description'] = 'Dummy template file for holding non-template contents. This should not be edited.';
$modversion['templates'][13]['file'] = 'system_notification_list.html';
$modversion['templates'][13]['description'] = '';
$modversion['templates'][14]['file'] = 'system_notification_select.html';
$modversion['templates'][14]['description'] = '';
$modversion['templates'][15]['file'] = 'system_block_dummy.html';
$modversion['templates'][15]['description'] = 'Dummy template for custom blocks or blocks without templates';
$modversion['templates'][16]['file'] = 'system_privpolicy.html';
$modversion['templates'][16]['description'] = 'Template for displaying site Privacy Policy';
$modversion['templates'][17]['file'] = 'system_error.html';
$modversion['templates'][17]['description'] = 'Template for handling HTTP errors';
$modversion['templates'][18]['file'] = 'system_content.html';
$modversion['templates'][18]['description'] = 'Template of content pages';
$modversion['templates'][19]['file'] = 'blocks/system_block_contentmenu_structure.html';
$modversion['templates'][19]['description'] = 'Template of content pages';
$modversion['templates'][20]['file'] = 'admin/content/system_adm_contentmanager_index.html';
$modversion['templates'][20]['description'] = 'Template of the admin of content manager';
$modversion['templates'][21]['file'] = 'admin/blockspadmin/system_adm_blockspadmin.html';
$modversion['templates'][21]['description'] = 'Template of the admin of block position admin';
$modversion['templates'][22]['file'] = 'admin/pages/system_adm_pagemanager_index.html';
$modversion['templates'][22]['description'] = 'Template of the admin of pages manager';
$modversion['templates'][23]['file'] = 'admin/blocksadmin/system_adm_blocksadmin.html';
$modversion['templates'][23]['description'] = 'Template for the blocks admin';
$modversion['templates'][24]['file'] = 'admin/modulesadmin/system_adm_modulesadmin.html';
$modversion['templates'][24]['description'] = 'Template for the modules admin';

// Blocks
$modversion['blocks'][1]['file'] = "system_blocks.php";
$modversion['blocks'][1]['name'] = _MI_SYSTEM_BNAME2;
$modversion['blocks'][1]['description'] = "Shows user block";
$modversion['blocks'][1]['show_func'] = "b_system_user_show";
$modversion['blocks'][1]['template'] = 'system_block_user.html';

$modversion['blocks'][2]['file'] = "system_blocks.php";
$modversion['blocks'][2]['name'] = _MI_SYSTEM_BNAME3;
$modversion['blocks'][2]['description'] = "Shows login form";
$modversion['blocks'][2]['show_func'] = "b_system_login_show";
$modversion['blocks'][2]['template'] = 'system_block_login.html';

$modversion['blocks'][3]['file'] = "system_blocks.php";
$modversion['blocks'][3]['name'] = _MI_SYSTEM_BNAME4;
$modversion['blocks'][3]['description'] = "Shows search form block";
$modversion['blocks'][3]['show_func'] = "b_system_search_show";
$modversion['blocks'][3]['template'] = 'system_block_search.html';

$modversion['blocks'][4]['file'] = "system_blocks.php";
$modversion['blocks'][4]['name'] = _MI_SYSTEM_BNAME5;
$modversion['blocks'][4]['description'] = "Shows contents waiting for approval";
$modversion['blocks'][4]['show_func'] = "b_system_waiting_show";
$modversion['blocks'][4]['template'] = 'system_block_waiting.html';

$modversion['blocks'][5]['file'] = "system_blocks.php";
$modversion['blocks'][5]['name'] = _MI_SYSTEM_BNAME6;
$modversion['blocks'][5]['description'] = "Shows the main navigation menu of the site";
$modversion['blocks'][5]['show_func'] = "b_system_main_show";
$modversion['blocks'][5]['template'] = 'system_block_mainmenu.html';

$modversion['blocks'][6]['file'] = "system_blocks.php";
$modversion['blocks'][6]['name'] = _MI_SYSTEM_BNAME7;
$modversion['blocks'][6]['description'] = "Shows basic info about the site and a link to Recommend Us pop up window";
$modversion['blocks'][6]['show_func'] = "b_system_info_show";
$modversion['blocks'][6]['edit_func'] = "b_system_info_edit";
$modversion['blocks'][6]['options'] = "320|190|s_poweredby.gif|1";
$modversion['blocks'][6]['template'] = 'system_block_siteinfo.html';

$modversion['blocks'][7]['file'] = "system_blocks.php";
$modversion['blocks'][7]['name'] = _MI_SYSTEM_BNAME8;
$modversion['blocks'][7]['description'] = "Displays users/guests currently online";
$modversion['blocks'][7]['show_func'] = "b_system_online_show";
$modversion['blocks'][7]['template'] = 'system_block_online.html';

$modversion['blocks'][8]['file'] = "system_blocks.php";
$modversion['blocks'][8]['name'] = _MI_SYSTEM_BNAME9;
$modversion['blocks'][8]['description'] = "Top posters";
$modversion['blocks'][8]['show_func'] = "b_system_topposters_show";
$modversion['blocks'][8]['options'] = "10|1";
$modversion['blocks'][8]['edit_func'] = "b_system_topposters_edit";
$modversion['blocks'][8]['template'] = 'system_block_topusers.html';

$modversion['blocks'][9]['file'] = "system_blocks.php";
$modversion['blocks'][9]['name'] = _MI_SYSTEM_BNAME10;
$modversion['blocks'][9]['description'] = "Shows most recent users";
$modversion['blocks'][9]['show_func'] = "b_system_newmembers_show";
$modversion['blocks'][9]['options'] = "10|1";
$modversion['blocks'][9]['edit_func'] = "b_system_newmembers_edit";
$modversion['blocks'][9]['template'] = 'system_block_newusers.html';

$modversion['blocks'][10]['file'] = "system_blocks.php";
$modversion['blocks'][10]['name'] = _MI_SYSTEM_BNAME11;
$modversion['blocks'][10]['description'] = "Shows most recent comments";
$modversion['blocks'][10]['show_func'] = "b_system_comments_show";
$modversion['blocks'][10]['options'] = "10";
$modversion['blocks'][10]['edit_func'] = "b_system_comments_edit";
$modversion['blocks'][10]['template'] = 'system_block_comments.html';

// RMV-NOTIFY:
// Adding a block...
$modversion['blocks'][11]['file'] = "system_blocks.php";
$modversion['blocks'][11]['name'] = _MI_SYSTEM_BNAME12;
$modversion['blocks'][11]['description'] = "Shows notification options";
$modversion['blocks'][11]['show_func'] = "b_system_notification_show";
$modversion['blocks'][11]['template'] = 'system_block_notification.html';

$modversion['blocks'][12]['file'] = "system_blocks.php";
$modversion['blocks'][12]['name'] = _MI_SYSTEM_BNAME13;
$modversion['blocks'][12]['description'] = "Shows theme selection box";
$modversion['blocks'][12]['show_func'] = "b_system_themes_show";
$modversion['blocks'][12]['options'] = "0|80";
$modversion['blocks'][12]['edit_func'] = "b_system_themes_edit";
$modversion['blocks'][12]['template'] = 'system_block_themes.html';

$modversion['blocks'][13]['file'] = "system_blocks.php";
$modversion['blocks'][13]['name'] = _MI_SYSTEM_BNAME14;
$modversion['blocks'][13]['description'] = "Displays image links to change the site language";
$modversion['blocks'][13]['show_func'] = "b_system_multilanguage_show";
$modversion['blocks'][13]['template'] = 'system_block_multilanguage.html';

//Content Manager

$modversion['blocks'][14]['file'] = "content_blocks.php";
$modversion['blocks'][14]['name'] = _MI_SYSTEM_BNAME15;
$modversion['blocks'][14]['description'] = "Show content page";
$modversion['blocks'][14]['show_func'] = "b_content_show";
$modversion['blocks'][14]['options'] = "1|1|1|1";
$modversion['blocks'][14]['edit_func'] = "b_content_edit";
$modversion['blocks'][14]['template'] = 'system_block_content.html';

$modversion['blocks'][15]['file'] = "content_blocks.php";
$modversion['blocks'][15]['name'] = _MI_SYSTEM_BNAME16;
$modversion['blocks'][15]['description'] = "Menu of content pages and categories";
$modversion['blocks'][15]['show_func'] = "b_content_menu_show";
$modversion['blocks'][15]['options'] = "content_weight|ASC|1|#F2E2A0";
$modversion['blocks'][15]['edit_func'] = "b_content_menu_edit";
$modversion['blocks'][15]['template'] = 'system_block_contentmenu.html';

$modversion['blocks'][16]['file'] = "content_blocks.php";
$modversion['blocks'][16]['name'] = _MI_SYSTEM_BNAME17;
$modversion['blocks'][16]['description'] = "Menu of content pages and categories";
$modversion['blocks'][16]['show_func'] = "b_content_relmenu_show";
$modversion['blocks'][16]['options'] = "content_weight|ASC|1";
$modversion['blocks'][16]['edit_func'] = "b_content_relmenu_edit";
$modversion['blocks'][16]['template'] = 'system_block_contentmenu.html';

// Menu
$modversion['hasMain'] = 0;
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "search_content";
?>