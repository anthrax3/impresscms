<?php
if (!defined('ICMS_ROOT_PATH')) die("ImpressCMS root path not defined");

/**
 * Contains the basis classes for displaying a single icms_ipf_Object
 *
 * @copyright	The ImpressCMS Project http://www.impresscms.org/
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package		icms_ipf_Object
 * @since		1.1
 * @author		marcan <marcan@impresscms.org>
 * @version		$Id: icmspersistablesingleview.php 19623 2010-06-25 14:59:15Z malanciault $
 */

/**
 * icms_ipf_view_Single base class
 *
 * Base class handling the display of a single object
 *
 * @package ImpressCMS Persistabke Framework
 * @author marcan <marcan@smartfactory.ca>
 * @link http://smartfactory.ca The SmartFactory
 */
class icms_ipf_view_Single {

	var $_object;
	var $_userSide;
	var $_tpl;
	var $_rows;
	var $_actions;
	var $_headerAsRow=true;

	/**
	 * Constructor
	 */
	function icms_ipf_view_Single(&$object, $userSide=false, $actions=array(), $headerAsRow=true)
	{
		$this->_object = $object;
		$this->_userSide = $userSide;
		$this->_actions = $actions;
		$this->_headerAsRow = $headerAsRow;
	}

	function addRow($rowObj) {
		$this->_rows[] = $rowObj;
	}

	function render($fetchOnly=false, $debug=false)
	{
		//include_once ICMS_ROOT_PATH . '/class/template.php';

		$this->_tpl = new icms_view_Tpl();
		$vars = $this->_object->vars;
		$icms_object_array = array();

		foreach ($this->_rows as $row) {
			$key = $row->getKeyName();
			if ($row->_customMethodForValue && method_exists($this->_object, $row->_customMethodForValue)) {
				$method = $row->_customMethodForValue;
				$value = $this->_object->$method();
			} else {
				$value = $this->_object->getVar($row->getKeyName());
			}
			if ($row->isHeader()) {
				$this->_tpl->assign('icms_single_view_header_caption', $this->_object->vars[$key]['form_caption']);
				$this->_tpl->assign('icms_single_view_header_value', $value);
			} else {
				$icms_object_array[$key]['value'] = $value;
				$icms_object_array[$key]['header'] = $row->isHeader();
				$icms_object_array[$key]['caption'] = $this->_object->vars[$key]['form_caption'];
			}
		}
		$action_row = '';
		if (in_array('edit', $this->_actions)) {
			$action_row .= $this->_object->getEditItemLink(false, true, $this->_userSide);
		}
		if (in_array('delete', $this->_actions)) {
			$action_row .= $this->_object->getDeleteItemLink(false, true, $this->_userSide);
		}
		if ($action_row) {
			$icms_object_array['zaction']['value'] = $action_row;
			$icms_object_array['zaction']['caption'] = _CO_ICMS_ACTIONS;
		}

		$this->_tpl->assign('icms_header_as_row', $this->_headerAsRow);
		$this->_tpl->assign('icms_object_array', $icms_object_array);

		/**
		 * @todo when ICMS 1.2 is out, change this for system_persistable_singleview.html
		 */
		if ($fetchOnly) {
			return $this->_tpl->fetch( 'db:system_persistable_singleview.html' );
		} else {
			$this->_tpl->display( 'db:system_persistable_singleview.html' );
		}
	}

	function fetch($debug=false) {
		return $this->render(true, $debug);
	}
}

?>