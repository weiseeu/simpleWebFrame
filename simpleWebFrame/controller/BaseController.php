<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 上午11:29
 */

namespace simpleWebFrame\controller;


use simpleWebFrame\command\CommandResolver;
use simpleWebFrame\request\Request;

class BaseController
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
        $commandResolver = new CommandResolver();
        $request = new Request();
        $commandResolver->getCommand($request)->execute($request);
    }
}