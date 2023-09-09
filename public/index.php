<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

/**
 * Entry point for the /public site.
 */

// First off, we'll grab the Composer dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Workaround to get php built-in server to access legacy assets
// @see : https://github.com/slimphp/Slim/issues/359#issuecomment-363076423
if (PHP_SAPI == 'cli-server') {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

use UserFrosting\Theme\UiKit\UiKitTheme;
use UserFrosting\UserFrosting;

$uf = new UserFrosting(UiKitTheme::class);
$uf->run();
