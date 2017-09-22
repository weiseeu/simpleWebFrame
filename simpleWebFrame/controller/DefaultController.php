<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午3:01
 */

namespace simpleWebFrame\controller;


use simpleWebFrame\request\Request;

class DefaultController extends Controller
{

    function execute(Request $request)
    {
        // TODO: Implement doExecute() method.
        include(dirname(__DIR__)."/view/welcome.php");
    }
}