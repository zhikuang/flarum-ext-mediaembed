<?php 
namespace c78\MediaEmbed;
use Flarum\Event\ConfigureFormatter;
use Illuminate\Events\Dispatcher;
use s9e\TextFormatter\Configurator\Bundles\MediaPack;

function subscribe(Dispatcher $events)
{
    $events->listen(
        ConfigureFormatter::class,
        function (ConfigureFormatter $event)
        {
            $event->configurator->Autoimage;
            $event->configurator->MediaEmbed->add(
                'music163',
                [
                    'host'    => 'music.163.com',
                    'extract' => "!music\\.163\\.com/#/song\\?id=(?'id'\\d+)!",
                    'iframe'  => [
                        'width'  => 450,
                        'height' => 86,
                        'src'    => '//music.163.com/outchain/player?type=2&id={@id}&auto=0&height=66'
                    ]
                ]
            );
            $event->configurator->MediaEmbed->add(
                'bilibili',
                [   
                    'host'    => 'www.bilibili.com',
                    'extract' => [
                    	"!www.bilibili.com/video/av(?'id'\\d+)/!",
                    	"!www.bilibili.com/mobile/video/av(?'id'\\d+)\\.html!"
                    ],
                    'flash'  => [
                        'width'  => 760,
                        'height' => 450,
                        'src'    => 'https://static-s.bilibili.com/miniloader.swf?aid={@id}'
                    ]
                ]
            );
            $event->configurator->MediaEmbed->add(
                'tucao',
                [
                    'host'    => 'tucao.tv',
                    'extract' => "!tucao\\.tv/play/h(?'id'\\d+)/!",
                    'iframe'  => [
                        'width'  => 760,
                        'height' => 450,
                        'src'    => 'http://www.tucao.tv/mini/{@id}.swf'
                    ]

                ]
            );
            $event->configurator->MediaEmbed->add(
                'acfun',
                [   
                    'host'    => 'www.acfun.tv',
                    'extract' => "!www.acfun.tv/v/ac(?'id'\\d+)!",
                    'iframe'  => [
                        'width'  => 760,
                        'height' => 450,
                        'src'    => 'http://cdn.aixifan.com/player/ACFlashPlayer.out.swf?vid={@id}'
                    ]
                ]
            );
            $event->configurator->MediaEmbed->add(
                'ku6',
                [
                    'host'    => 'ku6.com',
                    'extract' => [
                        "!ku6\\.com/show/(?'id'[\\w\\.\\-]+)\\.html!",
                        "!ku6\\.com/special/\\w+/(?'id'[\\w\\.\\-]+)\\.html!"
                    ],
                    'flash'  => [
                        'width'  => 760,
                        'height' => 450,
                        'flashvars' => "from=ku6",
                        'src'    => 'http://player.ku6.com/refer/{@id}/v.swf&auto=0'
                    ]
                ]
            );
            $event->configurator->MediaEmbed->add(
                'tudou',
                [
                    'host'    => 'tudou.com',
                    'extract' => [
                        "!tudou\\.com/programs/view/(?'id'\\w+)/!",
                        "!tudou\\.com/[^/]+/(?'code'\\w+)/(?'id'\\w+)\\.html!"
                    ],
                    'iframe'  => [
                        'width'  => 760,
                        'height' => 450,
                        'src'    => 'http://www.tudou.com/programs/view/html5embed.action?type=0&code={@id}&lcode={@code}'
                    ]
                ]
            );
             $event->configurator->MediaEmbed->add(
                'qq',
                [
                    'host'    => 'qq.com',
                    'extract' => [
                       "!qq\\.com/x/cover/\\w+/(?'id'\\w+)\\.html!",
                       "!qq\\.com/x/cover/\\w+\\.html\\?vid=(?'id'\\w+)!",
                       "!qq\\.com/cover/[^/]+/\\w+/(?'id'\\w+)\\.html!",
                       "!qq\\.com/cover/[^/]+/\\w+\\.html\\?vid=(?'id'\\w+)!",
                       "!qq\\.com/x/page/(?'id'\\w+)\\.html!",
                       "!qq\\.com/page/[^/]+/[^/]+/[^/]+/(?'id'\\w+)\\.html!"
                    ],
                    'iframe'  => [
                        'width'  => 760,
                        'height' => 450,
                        'src'    => '//v.qq.com/iframe/player.html?vid={@id}&tiny=0&auto=0'
                    ]
                ]
            );

             $event->configurator->MediaEmbed->add(
                'mgtv',
                [
                    'host'    => 'mgtv.com',
                    'extract' => "!mgtv\\.com/v/[^/]+/\\w+/[^/]+/(?'id'\\d+)\\.html!",
                    'flash'  => [
                        'width'  => 760,
                        'height' => 450,
                        'src'    => 'http://player.mgtv.com/mango-tv3-main/MangoTV_3.swf?play_type=1&video_id={@id}'
                    ]
                ]
            );

             $event->configurator->MediaEmbed->add(
                'zhikuangshare',
                [
                    'host'      => 'share.zhikuang.org',
                    'extract'   => "!share\\.zhikuang\\.org/backtest\\?platform=(?'platform'\\w+)&id=(?'id'\\d+)!",
                    'iframe'    => [
                        'width' => 760,
                        'height' => 450,
                        'src' => 'http://share.zhikuang.org/backtest?platform={@platform}&id={@id}'
                    ]
                ]
            );


             $event->configurator->MediaEmbed->add(
                'test',
                [
                    'host'    => 'test.com',
                    'extract' => "!test\\.com!",
                    'flash'  => [
                        'width'  => 760,
                        'height' => 450, 
                        'src'    => 'http://test.com'
                    ]

                ]
            );
            (new MediaPack)->configure($event->configurator);
        }
    );
};

return __NAMESPACE__ . '\\subscribe';
