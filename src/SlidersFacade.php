<?php

namespace Mortezaa97\Sliders;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezaa97\Sliders\Skeleton\SkeletonClass
 */
class SlidersFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sliders';
    }
}
