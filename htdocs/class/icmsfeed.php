<?php

/**
*
* Module RSS Feed Class 
*
* @copyright	http://www.impresscms.org/ The ImpressCMS Project 
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package	    core
* @since		1.1
* @author		Ignacio Segura, "Nachenko"
* @version		$Id$
*/

if (!defined('ICMS_ROOT_PATH')) {
	exit();
}

class IcmsFeed {

		var $title;
		var $url;
		var $description;
		var $language;
		var $charset;
		var $category;
		var $pubDate;
		var $webMaster;
		var $generator;
		var $image = array ();

	function IcmsFeed () {
		global $xoopsConfig;
		$this->title = $xoopsConfig['sitename'];
		$this->url = ICMS_URL;
		$this->description = $xoopsConfig['slogan'];
		$this->language = _LANGCODE;
		$this->charset = _CHARSET;
		$this->pubDate = date(_DATESTRING, time());
		$this->webMaster = $xoopsConfig['adminmail'];
		$this->generator = XOOPS_VERSION;
		$this->image = array (
			'title' => $this->title,
			'url' => ICMS_URL.'/images/logo.gif',
		);
		$this->feeds = array ();
	}

	function render () {
		//header ('Content-Type:text/xml; charset='._CHARSET);
		$xoopsOption['template_main'] = "db:system_rss.html";
		$tpl = new XoopsTpl();
		
		$tpl->assign('channel_title', $this->title);
		$tpl->assign('channel_link', $this->url);
		$tpl->assign('channel_desc', $this->description);
		$tpl->assign('channel_webmaster', $this->webMaster);
		$tpl->assign('channel_category', $this->category);
		$tpl->assign('channel_generator', $this->generator);
		$tpl->assign('channel_language', $this->language);
		$tpl->assign('image_url', $this->image['url']);
		foreach ($this->feeds as $feed) {
			$tpl->append('items', $feed);
		}
		$tpl->display('db:system_rss.html');
	}
}

?>