<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午7:18
 */

namespace simpleWebFrame\command;


use simpleWebFrame\request\Request;

class ErrorCommand extends Command
{

    /**
     * @param Request $request
     * @return mixed
     */
    function doExecute(Request $request)
    {
        // TODO: Implement doExecute() method.
        print_r("{$request->getProperties('Controller')} 类不存在！");
    }
}