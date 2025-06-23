<?php

namespace Daniellefence\Inputs;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Daniellefence\Inputs\Skeleton\SkeletonClass
 */
class InputsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'inputs';
    }
}
