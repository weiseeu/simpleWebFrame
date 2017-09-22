<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午2:25
 */

namespace simpleWebFrame\request;


use simpleWebFrame\registry\RequestRegistry;

class Request
{
    private $properties = [];
    private $feedback = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->init();
        RequestRegistry::setRequest($this);
    }

    function init(){
        if (isset($_SERVER['REQUEST_METHOD'])){
            $this->properties = $_REQUEST;
            if (key_exists('PATH_INFO',$_SERVER)){
                $path = $_SERVER['PATH_INFO'];
                $pathArray = explode('/',$path);
                $paramNum = count($pathArray);
                if ($paramNum>=2){
                    $this->properties['Controller']=$pathArray[1];
                    $this->properties['Method'] = $pathArray[2];
                }elseif ($paramNum = 1){
                    $this->properties['Controller']=$pathArray[1];
                    $this->properties['Method'] = 'index';
                }
            }
            return;
        }

        foreach ($_SERVER['argv'] as $item) {
            if (strpos($item,'=')){
                list($key,$value)=explode('=',$item);
                $this->setProperties($key,$value);
            }
        }
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getProperties($key)
    {
        if (isset($this->properties[$key])){
            return $this->properties[$key];
        }
        return null;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setProperties($key,$value)
    {
        $this->properties[$key] = $value;
    }

    /**
     * @return array
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * @param $msg
     */
    public function addFeedback($msg)
    {
        $this->feedback[] = $msg;
    }

    public function getFeedbackString($separator = "\n")
    {
        return implode($separator,$this->getFeedback());
    }



}