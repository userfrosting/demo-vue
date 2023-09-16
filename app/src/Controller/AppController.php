<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Demo\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use UserFrosting\Sprinkle\Account\Authenticate\Authenticator;

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

    /**
     * Return static demo API.
     *
     * @param Response $response
     *
     * @return Response
     */
    public function api(Response $response): Response
    {
        $data = [
            [
                'url'    => 'https://getbootstrap.com/docs/5.3/getting-started/introduction/',
                'title'  => 'Bootstrap quick start guide',
                'number' => rand(1, 100),
            ],
            [
                'url'    => 'https://getbootstrap.com/docs/5.3/getting-started/webpack/',
                'title'  => 'Bootstrap Webpack guide',
                'number' => rand(1, 100),
            ],
            [
                'url'    => 'https://getbootstrap.com/docs/5.3/getting-started/parcel/',
                'title'  => 'Bootstrap Parcel guide',
                'number' => rand(1, 100),
            ],
            [
                'url'    => 'https://getbootstrap.com/docs/5.3/getting-started/vite/',
                'title'  => 'Bootstrap Vite guide',
                'number' => rand(1, 100),
            ],
            [
                'url'    => 'https://getbootstrap.com/docs/5.3/getting-started/contribute/',
                'title'  => 'Contributing to Bootstrap',
                'number' => rand(1, 100),
            ],
        ];

        // Write json response
        $payload = json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-Type', 'application/json');
    }

    /**
     * Return true if user is logged in, false otherwise.
     *
     * @param Response      $response
     * @param Authenticator $authenticator
     *
     * @return Response
     */
    public function authCheck(Response $response, Authenticator $authenticator): Response
    {
        $auth = $authenticator->check();
        $data = [
            'auth' => $auth,
            'user' => $auth ? $authenticator->user() : null,
        ];
        $payload = json_encode($data, JSON_THROW_ON_ERROR);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
