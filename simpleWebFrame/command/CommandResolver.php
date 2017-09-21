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

    /**
     * CommandResolver constructor.
     */
    public function __construct(){
        if (!self::$baseCmd){
            self::$baseCmd = new \ReflectionClass("\simpleWebFrame\command\Command");
            self::$defaultCmd = new DefaultCommand();
        }
    }

    /**
     * @param Request $request
     * @return object|DefaultCommand
     */
    public function getCommand(Request $request)
    {
        $cmd = $request->getProperties('cmd');
        $sep = DIRECTORY_SEPARATOR;
        if (!$cmd){
            return self::$defaultCmd;
        }
        $cmd = str_replace(['.',$sep],"",$cmd);
        $filePath = "simpleWebFrame{$sep}command{$sep}{$cmd}.php";
        $className = "simpleWebFrame\\command\\{$cmd}";

        if (file_exists($filePath)){
            @require_once("$filePath");
            if (class_exists($className)){
                $cmdClass = new \ReflectionClass($className);
                if ($cmdClass->isSubclassOf(self::$baseCmd)){
                    return $cmdClass->newInstance();
                }else{
                    $request->addFeedback("command {$cmd} is not a Command!");
                }
            }
        }
        $request->addFeedback("command {$cmd} is not found!");
        return clone self::$defaultCmd;
    }



}