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

        // Write empty response
        $payload = json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
