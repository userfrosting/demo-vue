<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Theme\UiKit;

use UserFrosting\Sprinkle\Core\Core;
use UserFrosting\Sprinkle\SprinkleRecipe;

class UiKitTheme implements SprinkleRecipe
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'UiKit Theme';
    }

    /**
     * {@inheritdoc}
     */
    public function getPath(): string
    {
        return __DIR__ . '/../';
    }

    /**
     * {@inheritdoc}
     */
    public function getSprinkles(): array
    {
        return [
            Core::class,
        ];
    }

    /**
     * Returns a list of routes definition in PHP files.
     *
     * @return string[]
     */
    public function getRoutes(): array
    {
        return [
            Routes::class,
        ];
    }

    /**
     * Returns a list of all PHP-DI services/container definitions files.
     *
     * @return string[]
     */
    public function getServices(): array
    {
        return [];
    }
}
