<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午3:01
 */

namespace simpleWebFrame\command;


use simpleWebFrame\request\Request;

class DefaultCommand extends Command
{

    function doExecute(Request $request)
    {
        // TODO: Implement doExecute() method.
        include(dirname(__DIR__)."/view/welcome.php");
    }
}