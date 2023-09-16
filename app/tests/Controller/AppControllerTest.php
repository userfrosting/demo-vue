<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Tests\Demo\Controller;

use UserFrosting\Demo\Demo;
use UserFrosting\Testing\TestCase;

/**
 * Tests for AppController Class.
 */
class AppControllerTest extends TestCase
{
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
}
