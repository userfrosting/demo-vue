<?php

declare(strict_types=1);

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

return [
    'csrf' => [
        'enabled' => false,
    ],

    'vite' => [
        'dev' => env('VITE_DEV_ENABLED', true),
        'base' => '',
        'server' => 'http://[::1]:3000/'
    ]
];
