<?php

/**
 * @var \SleepingOwl\Admin\Contracts\Navigation\NavigationInterface $navigation
 */

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
    ]
]);
