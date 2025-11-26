<?php

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'bi bi-speedometer',
        'route' => 'dashboard',
        'permission' => null,
    ],
    [
        'title' => 'Master Document',
        'icon'  => 'bi bi-files',
        'route' => 'master-document.index',
        'permission' => 'master-document.view',
    ],
    [
        'title' => 'Application',
        'icon'  => 'bi bi-download',
        'route' => 'application.list',
        'permission' => 'student.view',
    ],
    [
        'title' => 'Student',
        'icon'  => 'bi bi-people',
        'route' => 'student.index',
        'permission' => 'student.view',
    ],
    [
        'title' => 'Country',
        'icon'  => 'bi bi-flag',
        'route' => 'country.index',
        'permission' => 'country.view',
    ],
    [
                'title' => 'Users',
                'icon'  => 'bi bi-people',
                'route' => 'users.index',
                'permission' => 'users.view',
            ],
    // [
    //     'title' => 'Sysadmin',
    //     'icon'  => 'bi bi-gear',
    //     'permission' => null,
    //     'submenu' => [
    //         [
    //             'title' => 'Permission',
    //             'icon'  => 'bi bi-speedometer',
    //             'route' => 'permissions.index',
    //             'permission' => 'manage-permission',
    //         ],
    //         [
    //             'title' => 'Roles',
    //             'icon'  => 'bi bi-gear',
    //             'route' => 'roles.index',
    //             'permission' => 'manage-roles',
    //         ],
    //         [
    //             'title' => 'Users',
    //             'icon'  => 'bi bi-people',
    //             'route' => 'users.index',
    //             'permission' => 'users.view',
    //         ],
    //     ],
    // ],
];
