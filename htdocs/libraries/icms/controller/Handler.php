<?php

/**
 * This is a handler for controllers
 *
 * @author Raimondas Rimkevičius <mekdrop@impresscms.org>
 */
class icms_controller_Handler {
    
    /**
     * Current controller type
     *
     * @var string
     */
    private $type = '';
    
    /**
     * Constructor
     */
    public function __construct() {
        switch (PHP_SAPI) {
            case 'embed':
                $this->type = 'embed';
            break;
            case 'cli':
                $this->type = 'command';
            break;
            default:
                $this->type = 'controller';
            break;
        }
    }
    
    /**
     * Magic getter
     * 
     * @param string $name
     * 
     * @return mixed
     */
    public function __get($name) {
        return $this->$name;
    }
        
    /**
     * Gets controller
     * 
     * @param string $module
     * @param string $type
     * @param string $controller_name
     * 
     * @return icms_controller_base|null
     */
    public function get($module, $type, $controller_name) {        
        include_once $this->getControllersPath($module, $type) . DIRECTORY_SEPARATOR . $controller_name . '.php'; 
        $class = '\\ImpressCMS\\Modules\\' . $module . '\\' . ucfirst($type) . '\\' . $controller_name;
        return class_exists($class)?new $class():null;
    }
    
    /**
     * Parses params string to array
     * 
     * @param string $module
     * @param string $controller_name
     * @param string $string
     * 
     * @return string
     */
    public function parseParamsStringToArray($module, $controller_name, $string) {
        $controller = $this->get($module, $this->type, $controller_name);
        $reflector = new ReflectionClass($controller);
        if (preg_match_all($reflector->getConstant('REGEX_PARAMS_PARSER'), $string, $matches, PREG_SET_ORDER) > 0) {
            $ret = [];
            if (isset($matches[0][2])) {
                foreach($matches as $match) {
                    $ret[$match[1]] = $match[2];
                }
            } else {
                foreach($matches as $match) {
                    $ret[] = $match[1];
                }
            }
            return $ret;
        } else {
            return [];
        }
    }
    
    /**
     * Gets controller
     * 
     * @param string $module
     * @param string $type
     * @param string $controller_name
     * @param string $action
     * @param array  $params
     * 
     * @return icms_response_Text
     */    
    public function exec($module, $type, $controller_name, $action, array $params) {        
        $controller = $this->get($module, $type, $controller_name);
        $reflector = new ReflectionClass($controller);
        if (!$reflector->hasMethod($action)) {
            throw new Exception($action . ' is not defined');            
        }
        $method = $reflector->getMethod($action);
        if (empty($params)) {
            $controller->$action();
        } else {            
            if (is_int(key($params))) {
                $args = &$params;
            } else {
                $args = [];                
                foreach ($method->getParameters() as $param) {
                    $args[] = $params[$param->getName()];
                }
            }
            call_user_func_array([$controller, $action], $args);
        }            
    }
    
    /**
     * Gets path for module controllers
     * 
     * @param string $module
     * @param string $type
     * 
     * @return string
     */
    public function getControllersPath($module, $type) {
        static $paths = [];
        if (!isset($paths[$module]) || !isset($paths[$module][$type])) {
            $paths[$module][$type] = ICMS_MODULES_PATH . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $type;
        }
        return $paths[$module][$type];
    }
    
    /**
     * Gets controllers of type list for module
     * 
     * @param string $module
     * @param string $type
     * 
     * @return array
     */
    public function getAvailable($module, $type) {
        $pwd = getcwd();
        $path = $this->getControllersPath($module, $type);
        if (!is_dir($path)) {
            return [];
        }
        chdir($path);
        $ret = [];
        $prefix = '\\ImpressCMS\\Modules\\' . $module . '\\' . ucfirst($type) . '\\';
        foreach (glob('*.php') as $file) {
            include_once $file;
            $class = $prefix . substr($file, 0, -4);
            try {
                $reflection = new ReflectionClass($class);
            } catch (\Exception $ex) {
                continue;
            }
            if (!$reflection->isSubclassOf('\icms_controller_Object')) {
                continue;
            }
            $class = $reflection->getShortName();
            $ret[$class] = [];
            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                $params = [];
                foreach ($method->getParameters() as $param) {
                    if ($param->isPassedByReference() || $param->isCallable() || $param->isVariadic()) {
                        continue;
                    }
                    $params[$param->getName()] = [
                        'optional' => $param->isOptional(),
                        'default' => $param->isDefaultValueAvailable()?$param->getDefaultValue():null
                    ];
                }                          
                $ret[$class][$method->getShortName()] = [
                    'params' => $params,
                    'description' => $method->getDocComment() // TODO: Add actual parsing
                ];
            }                
            if (count($ret[$class]) === 0) {
                unset($ret[$class]);
                continue;
            }
            ksort($ret[$class]);
        }
        ksort($ret);
        chdir($pwd);
        return $ret;
    }
    
}
