<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午2:25
 */

namespace simpleWebFrame\registry;


use simpleWebFrame\request\Request;

class RequestRegistry extends Registry
{
    private $requests = [];
    private static $instance;

    /**
     * RequestRegistry constructor.
     */
    private function __construct() {}


    /**
     * @return RequestRegistry
     */
    public static function getInstance()
    {
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    protected function get($key)
    {
        // TODO: Implement get() method.
        if (isset($this->requests[$key])){
            return $this->requests[$key];
        }else{
            return null;
        }
    }

    /**
     * @param $key
     * @param $value
     */
    protected function set($key, $value)
    {
        // TODO: Implement set() method.
        $this->requests[$key] = $value;
    }


    /**
     * @param $value
     */
    public static function setRequest(Request $value)
    {
        self::getInstance()->set('request',$value);
    }

    /**
     * @return mixed|null
     */
    public static function getRequest()
    {
        return self::getInstance()->get('request');
    }
}