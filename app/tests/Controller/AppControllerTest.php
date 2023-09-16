<?php

/*
 * UserFrosting Vue Demo (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/demo-vue
 * @copyright Copyright (c) 2023 Louis Charette
 * @license   https://github.com/userfrosting/demo-vue/blob/main/LICENSE.md (MIT License)
 */

namespace UserFrosting\Tests\Demo\Controller;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use UserFrosting\Demo\Demo;
use UserFrosting\Sprinkle\Account\Authenticate\Authenticator;
use UserFrosting\Sprinkle\Account\Database\Models\User;
use UserFrosting\Testing\TestCase;

/**
 * Tests for AppController Class.
 */
class AppControllerTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    protected string $mainSprinkle = Demo::class;

    /**
     * Test index (`/`) page.
     */
    public function testPageIndex(): void
    {
        // Create request with method and url and fetch response
        $request = $this->createRequest('GET', '/');
        $response = $this->handleRequest($request);

        // Asserts
        $this->assertResponseStatus(200, $response);
        $this->assertNotSame('', (string) $response->getBody());
    }

    /**
     * Test api (`/api`) page.
     */
    public function testApiIndex(): void
    {
        // Create request with method and url and fetch response
        $request = $this->createRequest('GET', '/api');
        $response = $this->handleRequest($request);

        // Asserts
        $this->assertResponseStatus(200, $response);
        $this->assertJson((string) $response->getBody());
    }

    /**
     * With non-authenticated user.
     */
    public function testAuthCheckFalse(): void
    {
        // Create request with method and url and fetch response
        $request = $this->createRequest('GET', '/auth/check');
        $response = $this->handleRequest($request);

        // Asserts
        $this->assertResponseStatus(200, $response);
        $this->assertJson((string) $response->getBody());
        $this->assertJsonStringEqualsJsonString(
            '{"auth":false,"user":null}',
            (string) $response->getBody()
        );
    }

    /**
     * With Authenticated User
     */
    public function testAuthCheckTrue(): void
    {
        /** @var User */
        $user = User::factory()->make();

        // "Log in" user
        $authenticator = Mockery::mock(Authenticator::class)
            ->makePartial()
            ->shouldReceive('user')->andReturn($user)
            ->getMock();
        $this->ci->set(Authenticator::class, $authenticator);

        // Create request with method and url and fetch response
        $request = $this->createRequest('GET', '/auth/check');
        $response = $this->handleRequest($request);

        // Asserts
        $this->assertResponseStatus(200, $response);
        $this->assertJson((string) $response->getBody());
        $this->assertJsonResponse(
            ['auth' => true, 'user' => $user->toArray()],
            $response
        );
    }
}
