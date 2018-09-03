<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

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

$text = new Text('您好！overtrue。');

$items = [
    new NewsItem([
        'title'       => 'Test Video',
        'description' => '测试视频',
        'url'         => 'http://65.52.174.110/YouPHPTube/video/-2',
        'image'       => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1535958439990&di=a7028c37ac697a62340497a755977532&imgtype=0&src=http%3A%2F%2Fa.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2F0dd7912397dda1449dd17697bfb7d0a20cf4863e.jpg',
    ])
];
$news = new News($items);

$app->server->push(function ($message) {
    switch ($message['MsgType']) {
        case 'event':
            return '收到事件消息';
            break;
        case 'text':
            return $news;
            break;
        case 'image':
            return '收到图片消息';
            break;
        case 'voice':
            return '收到语音消息';
            break;
        case 'video':
            return '收到视频消息';
            break;
        case 'location':
            return '收到坐标消息';
            break;
        case 'link':
            return '收到链接消息';
            break;
        case 'file':
            return '收到文件消息';
        // ... 其它消息
        default:
            return '收到其它消息';
            break;
    }

    // ...
});

$app = Factory::officialAccount($options);

$response = $app->server->serve();

// 将响应输出
$response->send(); // Laravel 里请使用：return $response;

?>