<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午3:18
 */
use simpleWebFrame\registry\RequestRegistry;
$request = RequestRegistry::getRequest();
echo "<html><header></header><body><h1>welcome to the simpleWebFrame!</h1><h2>{$request->getFeedbackString()}</h2></body></html>";

