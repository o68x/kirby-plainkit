<?php

return [
    'ready' => function ($kirby) {
        // https://getkirby.com/docs/reference/system/options/ready
        return [
            'debug' => $kirby->user() !== null
        ];
    },
    // Add locale to get PCRE working with UTF accents, I think
    'locale' => [
        'LC_ALL' => 'fr_FR.utf8',
    ],
    'cache' => [
        'pages' => [
            'active' => false,
        ]
    ],
    'date' => [
        'handler' => 'intl'
    ],
    'panel' => [
        'css' => 'assets/css/panel.css',
        'vue' => [
            'compiler' => false,
        ]
    ],
    'thumbs' => [
        'srcsets' => require_once 'config.srcsets.php',
    ],
    'wearejust.meta-tags.default' => require_once 'metatags.default.php',
];
