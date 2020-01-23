<?php

namespace Kingsleyudenewu\Estoresms;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kingsleyudenewu\Estoresms\Skeleton\SkeletonClass
 */
class EstoresmsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'estoresms';
    }
}
