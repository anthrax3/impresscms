<?php
/**
* Form control creating a simple file upload element for an object derived from IcmsPersistableObject
*
* @copyright	The ImpressCMS Project http://www.impresscms.org/
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package		IcmsPersistableObject
* @since		  1.1
* @author		  marcan <marcan@impresscms.org>
* @version		$Id: icmsformuploadelement.php 1889 2008-04-30 15:54:09Z malanciault $
*/

if (!defined('ICMS_ROOT_PATH')) die("ImpressCMS root path not defined");

class IcmsFormUploadElement extends XoopsFormFile {

	/**
	 * Constructor
	 * @param	object    $object   reference to targetobject (@link IcmsPersistableObject)
	 * @param	string    $key      the form name
	 */
  function IcmsFormFileElement($object, $key) {
    $this->XoopsFormFile(_CO_ICMS_UPLOAD, $key, isset($object->vars[$key]['form_maxfilesize']) ? $object->vars[$key]['form_maxfilesize'] : 0);
    $this->setExtra(" size=50");
  }


	/**
	 * prepare HTML for output
	 *
	 * @return	string	HTML
	 */
	function render(){
		return "<input type='hidden' name='MAX_FILE_SIZE' value='".$this->getMaxFileSize()."' />
		        <input type='file' name='".$this->getName()."' id='".$this->getName()."'".$this->getExtra()." />
		        <input type='hidden' name='icms_upload_file[]' id='icms_upload_file[]' value='".$this->getName()."' />";
	}
}
?>