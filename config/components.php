<?php

return [
    'user' => [
        [
            'field' => 'username',
            'list' => true,
            'create' => true,
            'edit' => true,
            'responsive' => 'all',
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'password',
            'list' => false,
            'create' => true,
            'type' => 'password',
            'required' => true,
            'help' => '密码至少8位',
        ],
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'confirm' => true,
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'department',
            'list' => true,
            'create' => true,
            'edit' => true,
            'confirm' => true,
            'type' => 'text',
        ],
        [
            'field' => 'email',
            'list' => true,
            'create' => true,
            'edit' => true,
            'confirm' => true,
            'type' => 'text',
        ],
        [
            'field' => 'is_admin',
            'list' => true,
            'create' => false,
            'edit' => false,
            'presenter' => true,
            'responsive' => 'none',
        ],
        [
            'field' => 'created_at',
            'list' => true,
            'create' => false,
            'edit' => false,
            'responsive' => 'none',
        ],
        [
            'field' => 'last_login_at',
            'list' => true,
            'create' => false,
            'edit' => false,
            'responsive' => 'none',
        ],
    ],
    'subject' => [
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'remark',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
    ],
    'type' => [
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'remark',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
    ],
    'language' => [
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'remark',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
    ],
    'database' => [
        [
            'field' => 'name',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'slug',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'text',
            'required' => true,
        ],
        [
            'field' => 'remote_url',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
        [
            'field' => 'local_url',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
        [
            'field' => 'brief',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
        [
            'field' => 'content',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
        [
            'field' => 'links',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
        [
            'field' => 'status',
            'list' => true,
            'create' => true,
            'edit' => true,
            'presenter' => true,
            'type' => 'select',
            'values' => '0:试用|1:正式购买|2:开放资源',
            'default' => '0',
            'required' => true,
        ],
        [
            'field' => 'expired_at',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'datetime',
        ],
        [
            'field' => 'remark',
            'list' => true,
            'create' => true,
            'edit' => true,
            'type' => 'textarea',
        ],
    ],
];