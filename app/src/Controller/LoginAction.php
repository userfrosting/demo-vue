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
use Psr\Http\Message\ServerRequestInterface as Request;
use UserFrosting\Sprinkle\Account\Controller\LoginAction as AccountLoginAction;

class LoginAction extends AccountLoginAction
{
    /**
     * Receive the request, dispatch to the handler, and return the payload to
     * the response.
     *
     * @param Request  $request
     * @param Response $response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $this->handle($request);

        // Write response
        $payload = json_encode($this->authenticator->user(), JSON_THROW_ON_ERROR);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
