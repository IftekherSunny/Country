<?php

namespace Sun\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sun\Country
 */
class CountryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Sun\Contract\Country';
    }
}