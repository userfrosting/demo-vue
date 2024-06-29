<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo;

use UserFrosting\Config\Config;
use UserFrosting\ServicesProvider\ServicesProviderInterface;
use UserFrosting\UniformResourceLocator\ResourceLocatorInterface;
use UserFrosting\ViteTwig\ViteManifest;
use UserFrosting\ViteTwig\ViteManifestInterface;
use UserFrosting\ViteTwig\ViteTwigExtension;

class Services implements ServicesProviderInterface
{
    public function register(): array
    {
        return [
            ViteManifestInterface::class => function (ResourceLocatorInterface $locator, Config $config) {
                $manifest = new ViteManifest(
                    manifestPath: (string) $locator->getResource('public://.vite/manifest.json'),
                    basePath: $config->getString('vite.base', ''),
                    devEnabled: $config->getBool('vite.dev', true),
                    serverUrl: $config->getString('vite.server', ''),
                );

                return $manifest;
            }
        ];
    }
}
