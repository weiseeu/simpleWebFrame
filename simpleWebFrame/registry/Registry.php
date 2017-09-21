<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午2:26
 */

namespace simpleWebFrame\registry;


abstract class Registry
{
    abstract protected function get($key);
    abstract protected function set($key,$value);
}