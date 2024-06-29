<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo;

use UserFrosting\Sprinkle\Core\Core;
use UserFrosting\Sprinkle\Core\Sprinkle\Recipe\TwigExtensionRecipe;
use UserFrosting\Sprinkle\SprinkleRecipe;
use UserFrosting\ViteTwig\ViteTwigExtension;

class Demo implements SprinkleRecipe, TwigExtensionRecipe
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
            CustomAccount::class,
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
        return [
            Services::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getTwigExtensions(): array
    {
        return [
            ViteTwigExtension::class,
        ];
    }
}
