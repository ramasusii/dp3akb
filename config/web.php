<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'dp3akb_sumut',
    'language' => 'id',
    'name'=> 'Dashboard',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        [
            'class' => 'app\components\LanguageSelector',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['Guest'], 
        ],
        'request' => [
            'cookieValidationKey' => 'dWTamT6jTvt7jjVhKvsFFfANQH72ewsB',
            'csrfParam' => 'dp3akb_sumut',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-user', 'httpOnly' => true],
            'idParam' => '_id_user',
        ],
        'errorHandler' => [
            'errorAction' =>  'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
       'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'], // ← info WAJIB ditambahkan kalau mau log info
                    'logFile' => '@app/runtime/logs/app.log',
                    'logVars' => [], // Optional: kalau tidak mau $_GET, $_POST dsb ikut ke-log
                ],
            ],
        ],

        'session' => [
            'class' => 'yii\web\Session',
            'savePath' => '@runtime/sessions', // atau Redis
            'useCookies' => true,
            'name' => 'dp3akb-sumut',
            'cookieParams' => [
                'httponly' => true,
                'lifetime' => 0,
            ],
        ],
        'db' => $db,
        'urlManager' => [
            // 'hostInfo' => 'cabdp3akb-kisaran.com',
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                            '<alias:treatment|tags|user|layanan-unggulan|artikel|infografis|video>' => '<alias>/index',
                            'ID/<id>' => '/site/idn',
                            'EN/<en>' => '/site/eng',
                            'services/tags/<tags>' => '/site/service',
                            'services/category/<ctgr>' => '/site/service',
                            [
                                'pattern' => 'DashboardAdmin',
                                'route'   => '/site/login',
                            ],
                            [
                                'pattern' => 'Beranda',
                                'route'   => '/site/index',
                            ],
                             [
                                'pattern' => 'visi-dan-misi',
                                'route'   => '/site/visi-misi',
                            ],
                            [
                                'pattern' => 'maklumat',
                                'route'   => '/site/maklumat',
                            ],
                            [
                                'pattern' => 'sk-pelayanan-dinas',
                                'route'   => '/site/sk-pelayanan-dinas',
                            ],
                            [
                                'pattern' => 'sk-pelayanan-upt',
                                'route'   => '/site/sk-pelayanan-upt',
                            ],

                            [
                                'pattern' => 'kontak',
                                'route'   => '/site/kontak',
                            ],
                            [
                                'pattern' => 'foto',
                                'route'   => '/site/foto',
                            ],
                            [
                                'pattern' => 'video-media',
                                'route'   => '/site/video',
                            ],
                            [
                                'pattern' => 'berita',
                                'route'   => '/site/berita',
                            ],
                            [
                                'pattern' => 'page/berita/<title:(?:[^_\W]|-)+>',
                                'route'   => '/site/berita-detail',
                            ],
                            [
                                'pattern' => 'berita/<slug:(?:[^_\W]|-)+>',
                                'route'   => '/site/detail-berita',
                            ],
                            [
                                'pattern' => 'list-berita',
                                'route'   => '/site/daftar-berita',
                            ],
                            
                             [
                                'pattern' => 'download/<title:(?:[^_\W]|-)+>',
                                'route'   => '/site/download-file',
                            ],
                            [
                                'pattern' => 'SetHeader',
                                'route'   => '/site/set-header',
                            ],
                            [
                                'pattern' => 'SetLayanan',
                                'route'   => '/site/set-layanan',
                            ],
                            [
                                'pattern' => 'SetTentang',
                                'route'   => '/site/set-tentang',
                            ],
                            [
                                'pattern' => 'SetKeunggulan',
                                'route'   => '/site/set-keunggulan',
                            ],
                            [
                                'pattern' => 'SetDownload',
                                'route'   => '/site/set-download',
                            ],
                            [
                                'pattern' => 'SetFooter',
                                'route'   => '/site/set-footer',
                            ],
                            [
                                'pattern' => 'SetVideo',
                                'route'   => '/site/set-video',
                            ],
                            [
                                'pattern' => 'SetPrice',
                                'route'   => '/site/set-price',
                            ],
                            [
                                'pattern' => 'Bidang-1',
                                'route'   => '/site/bidang1',
                            ],
                            [
                                'pattern' => 'Bidang-2',
                                'route'   => '/site/bidang2',
                            ],
                            [
                                'pattern' => 'Bidang-3',
                                'route'   => '/site/bidang3',
                            ],
                            [
                                'pattern' => 'Bidang-4',
                                'route'   => '/site/bidang4',
                            ],
                            [
                                'pattern' => 'Bidang-5',
                                'route'   => '/site/bidang5',
                            ],
                            [
                                'pattern' => 'Bidang-6',
                                'route'   => '/site/bidang6',
                            ],
                            [
                                'pattern' => 'Bidang-7',
                                'route'   => '/site/bidang7',
                            ],
                            [
                                'pattern' => 'Kepengurusan',
                                'route'   => '/site/kepengurusan',
                            ],
                            [
                                'pattern' => 'Sejarah',
                                'route'   => '/site/sejarah',
                            ],
                            [
                                'pattern' => 'Visi-Misi',
                                'route'   => '/site/visimisi',
                            ],
                            [
                                'pattern' => 'Lokasi',
                                'route'   => '/site/lokasi',
                            ],
                            [
                                'pattern' => 'Sumut',
                                'route'   => '/site/sumut',
                            ],
                            [
                                'pattern' => 'Aceh',
                                'route'   => '/site/aceh',
                            ],
                             [
                                'pattern' => 'Faq',
                                'route'   => '/site/faq',
                            ],
                            [
                                'pattern' => 'edukasi',
                                'route'   => '/site/edukasi',
                            ],

                            [
                                'pattern' => 'edukasi/download/<slug:[a-zA-Z0-9\-]+>',
                                'route'   => '/site/download-edukasi',
                            ],

                            [
                                'pattern' => 'edukasi/baca/<slug:[a-zA-Z0-9\-]+>',
                                'route'   => '/site/baca-ebook',
                            ],

                            [
                                'pattern' => 'edukasi/<slug:[a-zA-Z0-9\-]+>',
                                'route'   => '/site/detail-edukasi',
                            ],

                            [
                                'pattern' => 'download/<title:(?:[^_\W]|-)+>',
                                'route'   => '/site/download-file',
                            ],
                        ],
        ],
        'mycomponent' => [
            'class' => 'app\components\MyComponent',
        ],
        'jwt' => [
            'class' => 'sizeg\jwt\Jwt',
            'key'   => 'n4si6or3ngkamp0ng',
        ],
        'firebaseMessaging' => [
            'class' => 'app\components\FirebaseMessaging',
        ],
        'visitorTracker' => [
            'class' => 'app\components\VisitorTracker',
        ],
    ],        
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            'menus' => [
                'user' => null
            ],
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                // '*',      
                // 'admin/user/signup',      
                'api/*',      
                'gii/*',      
                'site/preview-buku', 
                'web/*',
                // 'admin/*',    
                'site/*',     
            ]
        ],

];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
