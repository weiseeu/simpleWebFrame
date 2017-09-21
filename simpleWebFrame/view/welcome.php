<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 2017/9/21
 * Time: 下午3:18
 */
use simpleWebFrame\registry\RequestRegistry;

$request = RequestRegistry::getRequest();
$html = "<html>
    <head>
        <title>simpleWebFrame</title>
        
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class=\"container\">
            <div class=\"content\">
                <div class=\"title\">simpleWebFrame</div>
                <div class=\"quote\">lighter, easier and faster to market!</div>
                <div class=\"quote\" style='margin-top: 10px'> xiangang</div>
            </div>
        </div>
    </body>
</html>
";
echo $html;
