<?php

return [
    'js' => [
        'name' => 'engine',
        'uses' => [
            'jquery',
            'jquery.nicescroll',
            'bootstrap',
            env('APP_DEBUG') ? 'react-dev' : 'react',
            'markdown',
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