<?php

namespace Wharfs\UISPApiClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wharfs\UISPApiClient\UISPApiClient
 */
class UISPApiClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'uisp-api-client';
    }
}
