<?php

namespace Frameck\LaravelQueryDateHelpers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Frameck\LaravelQueryDateHelpers\LaravelQueryDateHelpers
 */
class LaravelQueryDateHelpers extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Frameck\LaravelQueryDateHelpers\LaravelQueryDateHelpers::class;
    }
}
