<?php

require_once 'vendor/autoload.php'

use EasyWeChat\Factory;

$options = [
    'app_id'    => 'wx46c1048f6dd37723',
    'secret'    => '15d3ecb0f6b685302c7e268859221991',
    'token'     => 'haiyangtest',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$app = Factory::officialAccount($options);

$response = $app->server->serve();

// 将响应输出
$response->send(); // Laravel 里请使用：return $response;

?>