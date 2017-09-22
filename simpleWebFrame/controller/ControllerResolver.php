<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 上午11:32
 */

namespace simpleWebFrame\controller;


use simpleWebFrame\request\Request;

class ControllerResolver
{
    private static $baseController;
    private static $defaultController;
    private static $errorController;

    /**
     * ControllerResolver constructor.
     */
    public function __construct(){
        if (!self::$baseController){
            self::$baseController = new \ReflectionClass("\simpleWebFrame\controller\Controller");
            self::$defaultController = new DefaultController();
            self::$errorController = new ErrorController();
        }
    }

    /**
     * @param Request $request
     * @return object|DefaultController
     */
    public function getController(Request $request)
    {
        $Controller = $request->getProperties('Controller');
        $sep = DIRECTORY_SEPARATOR;
        if (!$Controller){
            return self::$defaultController;
        }
        $Controller = str_replace(['.',$sep],"",$Controller);
        $filePath = __DIR__."/{$Controller}Controller.php";
        $className = "simpleWebFrame\\controller\\{$Controller}Controller";

        if (file_exists($filePath)){
            require_once("$filePath");
            if (class_exists($className)){
                $ControllerClass = new \ReflectionClass($className);
                if ($ControllerClass->isSubclassOf(self::$baseController)){
                    return $ControllerClass->newInstance();
                }else{
                    $request->addFeedback("controller {$Controller} is not a Controller!");
                }
            }
        }
        $request->addFeedback("controller {$Controller} is not found!");
        return clone self::$errorController;
    }



}