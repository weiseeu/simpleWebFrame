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

    function execute(Request $request){
        $this->doExecute($request);
    }

    abstract function doExecute(Request $request);
}