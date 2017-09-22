<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午7:18
 */

namespace simpleWebFrame\controller;


use simpleWebFrame\request\Request;

class ErrorController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    function execute(Request $request)
    {
        // TODO: Implement doExecute() method.
        print_r("{$request->getFeedbackString()}");
    }
}