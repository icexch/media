<?php

use SleepingOwl\Admin\Navigation\Page;

AdminNavigation::setFromArray([
    [
        'title' => 'Users',
        'icon'  => 'fa fa-group',
        'pages' => [
            (new Page(\App\Models\User\Moderator::class)),
            (new Page(\App\Models\User\Advertiser::class)),
            (new Page(\App\Models\User\Publisher::class))
        ]
    ],
    (new Page(\App\Models\AdMaterial::class))->setIcon('fa fa-edit'),
    (new Page(\App\Models\Category::class))->setIcon('fa fa-book'),
    (new Page(\App\Models\Region::class))->setIcon('fa fa-map-pin'),
    (new Page(\App\Models\Platform::class))->setIcon('fa fa-map-pin')
]);
