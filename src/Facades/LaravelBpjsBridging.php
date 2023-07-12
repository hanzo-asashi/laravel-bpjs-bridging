<?php

namespace HanzoAsashi\LaravelBpjsBridging\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging
 */
class LaravelBpjsBridging extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging::class;
    }
}
