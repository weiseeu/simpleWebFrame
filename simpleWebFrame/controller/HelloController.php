<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/22
 * Time: 上午10:42
 */

namespace simpleWebFrame\controller;


use simpleWebFrame\request\Request;

class HelloController extends Controller
{

    public function index(Request $request){
        echo "hello!";
    }
}