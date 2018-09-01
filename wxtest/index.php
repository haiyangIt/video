<?php

use EasyWeChat\Factory;

$options = [
    'app_id'    => 'wx46c1048f6dd37723',
    'secret'    => '15d3ecb0f6b685302c7e268859221991',
    'token'     => 'haiyangtestphp',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$app = Factory::officialAccount($options);

$server = $app->server;
$user = $app->user;

$server->push(function($message) use ($user) {
    $fromUser = $user->get($message['FromUserName']);

    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
});

$server->serve()->send();

?>