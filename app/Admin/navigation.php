<?php

use SleepingOwl\Admin\Navigation\Page;

AdminNavigation::setFromArray([
    [
        'title' => 'Users',
        'icon'  => 'fa fa-users',
        'pages' => [
            (new Page(\App\Models\User\Moderator::class)),
            (new Page(\App\Models\User\Advertiser::class)),
            (new Page(\App\Models\User\Publisher::class))
        ]
    ],
    (new Page(\App\Models\AdMaterial::class))->setIcon('fa fa-edit'),
    (new Page(\App\Models\Place::class))->setIcon('fa fa-window-restore'),
    (new Page(\App\Models\Category::class))->setIcon('fa fa-book'),
    (new Page(\App\Models\Region::class))->setIcon('fa fa-map-pin')
]);
