<?php
if (!defined('ICMS_ROOT_PATH')) {
	die("ImpressCMS root path not defined");
}

include_once ICMS_ROOT_PATH . '/class/xoopslists.php';

/**
* IcmsPreloadHandler
*
* Class handling preload events automatically detect from the files in ICMS_PRELOAD_PATH
*
* @copyright	The ImpressCMS Project http://www.impresscms.org/
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package		core
* @since		1.1
* @author		marcan <marcan@impresscms.org>
* @version		$Id$
*/
class IcmsPreloadHandler {

	/**
	 * @var array $_preloadFilesArray array containing a list of all preload files in ICMS_PRELOAD_PATH
	 */
	var $_preloadFilesArray=array();

	/**
	 * @var array $_preloadEventsArray array containing a list of all events for all preload file, indexed by event name and sorted by order ox execution
	 */
	var $_preloadEventsArray=array();

	/**
	 * Constructor
     *
     * @return	void
	 */
	function IcmsPreloadHandler() {
		$preloadFilesArray = XoopsLists::getFileListAsArray(ICMS_PRELOAD_PATH);
		foreach ($preloadFilesArray as $filename) {
			// exclude index.html
			if ($filename != 'index.html') {
				$this->_preloadFilesArray[] = $filename;
				$this->addPreloadEvents($filename);
			}
		}
	}

	/**
	 * Add the events defined in filename
	 *
	 * @param string $filename
	 */
	function addPreloadEvents($filename) {
		include_once ICMS_PRELOAD_PATH . "/$filename";

		$classname = $this->getClassName($filename);
		$preloadItem = new $classname();

		$class_methods = get_class_methods($classname);
		foreach($class_methods as $method) {
			if (strpos($method, 'event') === 0) {
				$preload_event = strtolower(str_replace('event', '', $method));

				$preload_event_array = array(
											'object' => &$preloadItem,
											'method' => $method
										);

				$preload_event_weight_define_name = strtoupper($classname) . '_' . strtoupper($preload_event);

				if (defined($preload_event_weight_define_name)) {
					$preload_event_weight = constant($preload_event_weight_define_name);
					$this->_preloadEventsArray[$preload_event][$preload_event_weight] = $preload_event_array;
				} else {
					$this->_preloadEventsArray[$preload_event][] = $preload_event_array;
				}
			}
		}
	}

	/**
	 * Access the only instance of this class
     *
     * @static
     * @staticvar   object
     *
     * @return	object
     *
     */
	function &getInstance()
	{
		static $instance;
		if (!isset($instance)) {
			$instance = new IcmsPreloadHandler();
		}
		return $instance;
	}

	/**
	 * Triggers a specific event on all the libraries
	 *
	 * Here are the currently supported events:
	 * - finishCoreBoot : this event is triggered at the end of the core booting process (end of include/common.php)
	 * - adminHeader : this event is triggered when calling xoops_cp_header() and is used to output content in the head section of the admin side
	 * - beforeFooter : this event is triggered when include/footer.php is called, at the begining of the file
	 * - startOutputInit : this event is triggered when starting to output the content, in include/header.php after instantiation of $xoopsTpl
     *
     * @param $event string name of the event to trigger
     * @param $array mixed container to pass any arguments to be used by the library
     *
     * @return	TRUE if successful, FALSE if not
     */
	function triggerEvent($event, $array=false) {
		$event = strtolower($event);
		if (isset($this->_preloadEventsArray[$event])) {
			foreach ($this->_preloadEventsArray[$event] as $eventArray) {
				$method = $eventArray['method'];
				$eventArray['object']->$method($array);
			}
		}
	}

	/**
	 * Construct the name of the class based on the filename
     *
     * @param $filename string filename where the class is located
     *
     * @return	string name of the class
     *
     */
	function getClassName($filename) {
		return 'IcmsPreload' . ucfirst(str_replace('.php', '', $filename));
	}

}


/**
* IcmsPreloadItem
*
* Class which is extended by any preload item. This class is empty for now but is there for
* extended future purposes
*
* @copyright	The ImpressCMS Project http://www.impresscms.org/
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @package		libraries
* @since		1.1
* @author		marcan <marcan@impresscms.org>
* @version		$Id$
*/

class IcmsPreloadItem {

	function IcmsPreloadItem() {
	}
}
?>