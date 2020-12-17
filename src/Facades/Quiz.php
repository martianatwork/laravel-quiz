<?php

namespace Leobeal\Laravel\Quiz\Facades;

use Illuminate\Support\Facades\Facade;

class Quiz extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelquiz';
    }
}
