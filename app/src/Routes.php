<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Theme\UiKit;

use Slim\App;
use UserFrosting\Routes\RouteDefinitionInterface;
use UserFrosting\Theme\UiKit\Controller\AppController;

class Routes implements RouteDefinitionInterface
{
    public function register(App $app): void
    {
        $app->get('/', [AppController::class, 'pageIndex'])->setName('index');
    }
}
