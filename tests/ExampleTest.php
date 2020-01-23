<?php

namespace Kingsleyudenewu\Estoresms\Tests;

use Orchestra\Testbench\TestCase;
use Kingsleyudenewu\Estoresms\EstoresmsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EstoresmsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
