<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Tests\Demo\Controller;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use UserFrosting\Demo\Demo;
use UserFrosting\Sprinkle\Account\Authenticate\Authenticator;
use UserFrosting\Sprinkle\Account\Database\Models\User;
use UserFrosting\Sprinkle\Core\Testing\RefreshDatabase;
use UserFrosting\Testing\TestCase;

class LoginActionTest extends TestCase
{
    use RefreshDatabase;
    use MockeryPHPUnitIntegration;

    protected string $mainSprinkle = Demo::class;

    /**
     * Setup test database for controller tests
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
    }

    public function testLogin(): void
    {
        /** @var User */
        $user = User::factory([
            'password' => 'test'
        ])->create();

        // Create request with method and url and fetch response
        $request = $this->createJsonRequest('POST', '/auth/login', [
            'user_name' => $user->user_name,
            'password'  => 'test',
        ]);
        $response = $this->handleRequest($request);

        // Assert response status & body
        $this->assertResponseStatus(200, $response);
        $this->assertJsonResponse($user->refresh()->toArray(), $response);

        // We have to logout the user to avoid problem
        /** @var Authenticator */
        $authenticator = $this->ci->get(Authenticator::class);
        $authenticator->logout();
    }
}
