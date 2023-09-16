<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo;

use UserFrosting\Sprinkle\Account\Account;

/**
 * Overwrite main Account Sprinkle Class, to remove routes.
 */
class CustomAccount extends Account
{
    /**
     * {@inheritDoc}
     */
    public function getRoutes(): array
    {
        return [];
    }
}
