<?php

namespace V17Development\FlarumSeo\Tests\integration\forum;

use Flarum\Testing\integration\TestCase;

class ForumTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->extension('v17development-seo');
    }

    /**
     * @test
     */
    public function extension_boots_and_serializes()
    {
        $response = $this->send($this->request('GET', '/'));

        $this->assertEquals(200, $response->getStatusCode());

        $body = (string) $response->getBody();

        $this->assertStringStartsWith('<!doctype html>', $body);
        $this->assertStringContainsString('</html>', $body);
    }
}
