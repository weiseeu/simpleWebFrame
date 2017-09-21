<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午4:15
 */

namespace simpleWebFrame\command;


use simpleWebFrame\registry\ApplicationRegistry;
use simpleWebFrame\request\Request;

class Info extends Command
{

    function dbInfo(Request $request)
    {
        // TODO: Implement doExecute() method.
        header("Content-Type:application/json; charset=utf-8");
        $info = ApplicationRegistry::getSystemInfo();

        print_r(json_encode($info));
    }

    function info(Request $request)
    {
        // TODO: Implement doExecute() method.
        header("Content-Type:application/json; charset=utf-8");
        $info = [
            "name" => "xiangang2",
            "age" => "25"
        ];

        print_r(json_encode($info));
    }

    function helloWorld(Request $request)
    {
        // TODO: Implement doExecute() method.
        header("Content-Type:application/json; charset=utf-8");
        $info = [
            "name" => "hello world",
            "age" => "25"
        ];

        print_r(json_encode($info));
    }


    function doExecute(Request $request)
    {
        // TODO: Implement doExecute() method.
       $methodName = $request->getProperties('Method');
       if (!method_exists($this,$methodName)){
           echo "调用的方法{$methodName}不存在！";
           return;
       }
       $this->$methodName($request);
    }
}