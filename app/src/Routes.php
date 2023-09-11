<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo;

use Slim\App;
use UserFrosting\Demo\Controller\AppController;
use UserFrosting\Routes\RouteDefinitionInterface;

class Routes implements RouteDefinitionInterface
{
    public function register(App $app): void
    {
        // Use a catch-all route to allow the user to refresh the page when using vue-router createWebHistory API
        $app->get('/api', [AppController::class, 'api'])->setName('api');
        $app->get('/[{path:.*}]', [AppController::class, 'pageIndex'])->setName('index');
    }
}
