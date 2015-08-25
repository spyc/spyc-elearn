<?php

return [
    'js' => [
        'name' => 'engine',
        'uses' => [
            'jquery',
            'jquery.nicescroll',
            'bootstrap',
            'markdown',
            env('APP_DEBUG') ? 'react-dev' : 'react',
        ]
    ],
    'css' => [
        'name' => 'bootstrap',
        'uses' => [
            'normalize',
            'bootstrap',
            'bootstrap-theme',
            'font-awesome'
        ]
    ]
];