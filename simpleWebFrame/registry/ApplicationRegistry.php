<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午7:05
 */

namespace simpleWebFrame\registry;


class ApplicationRegistry extends Registry
{

    private static $instance;
    private static $systemInfo;

    /**
     * ApplicationRegistry constructor.
     */
    private function __construct()
    {

    }

    /**
     * @return ApplicationRegistry
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }


    public static function getSystemInfo()
    {
        $sep = DIRECTORY_SEPARATOR;
        $configFile = dirname(__DIR__)."{$sep}config{$sep}config.php";
        if (file_exists($configFile)){
            self::$systemInfo = require_once($configFile);
        }

        if (isset(self::$systemInfo)){
            return self::$systemInfo;
        }
    }

    /**
     * @param $key
     * @return mixed
     */
    protected function get($key)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    protected function set($key, $value)
    {
        // TODO: Implement set() method.
    }
}