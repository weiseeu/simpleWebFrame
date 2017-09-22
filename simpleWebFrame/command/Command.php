<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午2:59
 */

namespace simpleWebFrame\command;


use simpleWebFrame\request\Request;

abstract class Command
{
    final function __construct()
    {
    }

    function execute(Request $request)
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