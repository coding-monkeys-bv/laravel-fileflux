<?php

namespace Codingmonkeys\FileFlux;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codingmonkeys\FileFlux\Skeleton\SkeletonClass
 */
class FileFluxFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'file-flux';
    }
}
