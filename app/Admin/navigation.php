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
    (new Page(\App\Models\AdMaterial::class))->setIcon('fa fa-edit')
]);
