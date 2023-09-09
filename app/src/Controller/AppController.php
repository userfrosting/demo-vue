<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class AppController
{
    /**
     * Renders the default page.
     * Request type: GET.
     *
     * @param Response $response
     * @param Twig     $view
     */
    public function pageIndex(Response $response, Twig $view): Response
    {
        return $view->render($response, 'pages/index.html.twig');
    }
}
