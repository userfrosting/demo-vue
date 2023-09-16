<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo;

use Slim\App;
use UserFrosting\Demo\Controller\AppController;
use UserFrosting\Routes\RouteDefinitionInterface;
use UserFrosting\Sprinkle\Account\Controller\LoginAction;
use UserFrosting\Sprinkle\Account\Controller\LogoutAction;

class Routes implements RouteDefinitionInterface
{
    public function register(App $app): void
    {
        // Use a catch-all route to allow the user to refresh the page when using vue-router createWebHistory API
        $app->get('/api', [AppController::class, 'api'])->setName('api');
        $app->get('/auth/check', [AppController::class, 'authCheck'])->setName('authCheck');
        $app->post('/auth/login', LoginAction::class)->setName('account.login');
        $app->get('/auth/logout', LogoutAction::class)->setName('account.logout'); //->add(AuthGuard::class);
        $app->get('/[{path:.*}]', [AppController::class, 'pageIndex'])->setName('index');
    }
}
