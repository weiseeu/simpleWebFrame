<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 上午11:32
 */

namespace simpleWebFrame\command;


use simpleWebFrame\request\Request;

class CommandResolver
{
    private static $baseCmd;
    private static $defaultCmd;
    private static $errorCmd;

    /**
     * CommandResolver constructor.
     */
    public function __construct(){
        if (!self::$baseCmd){
            self::$baseCmd = new \ReflectionClass("\simpleWebFrame\command\Command");
            self::$defaultCmd = new DefaultCommand();
            self::$errorCmd = new ErrorCommand();
        }
    }

    /**
     * @param Request $request
     * @return object|DefaultCommand
     */
    public function getCommand(Request $request)
    {
        $Controller = $request->getProperties('Controller');
        $sep = DIRECTORY_SEPARATOR;
        if (!$Controller){
            return self::$defaultCmd;
        }
        $Controller = str_replace(['.',$sep],"",$Controller);
        $filePath = __DIR__."/{$Controller}.php";
        $className = "simpleWebFrame\\command\\{$Controller}";

        if (file_exists($filePath)){
            require_once("$filePath");
            if (class_exists($className)){
                $ControllerClass = new \ReflectionClass($className);
                if ($ControllerClass->isSubclassOf(self::$baseCmd)){
                    return $ControllerClass->newInstance();
                }else{
                    $request->addFeedback("command {$Controller} is not a Command!");
                }
            }
        }
        $request->addFeedback("command {$Controller} is not found!");
        return clone self::$errorCmd;
    }



}