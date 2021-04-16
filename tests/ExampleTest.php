<?php

namespace Blackfyre\BitnetGateway\Tests;

use Orchestra\Testbench\TestCase;
use Blackfyre\BitnetGateway\BitnetGatewayServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [BitnetGatewayServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
