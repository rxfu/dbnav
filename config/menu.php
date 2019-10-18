<?php

return [
    'navigation' => [
        [
            'title' => '首页',
            'url' => '/',
        ],
    ],
    'sidebar' => [
        'home' => [
            'title' => '使用说明',
            'icon' => 'tachometer-alt',
            'route' => 'home.index',
        ],
        'database' => [
            'title' => '数据库管理',
            'icon' => 'database',
            'route' => 'database.index',
        ],
        'subject' => [
            'title' => '学科管理',
            'icon' => 'database',
            'route' => 'subject.index',
        ],
        'type' => [
            'title' => '内容类型管理',
            'icon' => 'database',
            'route' => 'type.index',
        ],
        'language' => [
            'title' => '语种管理',
            'icon' => 'database',
            'route' => 'language.index',
        ],
        'user' => [
            'title' => '用户管理',
            'icon' => 'user',
            'route' => 'user.index',
        ],
        '个人设置',
        'password' => [
            'title' => '修改密码',
            'icon' => 'shield-alt',
            'route' => 'password.edit',
        ],
    ],
];