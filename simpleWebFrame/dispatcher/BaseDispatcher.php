<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/22
 * Time: 上午9:39
 */

namespace simpleWebFrame\dispatcher;

use simpleWebFrame\controller\ControllerResolver;
use simpleWebFrame\request\Request;

class BaseDispatcher
{
    /**
     * BaseController constructor.
     */
    private function __construct(){}

    public static function start()
    {
        $instance = new self();
        $instance->processRequest();
    }

    public function processRequest()
    {
        $commandResolver = new ControllerResolver();
        $request = new Request();
        $commandResolver->getController($request)->execute($request);
    }
}