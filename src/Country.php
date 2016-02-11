<?php

namespace Sun;

use Exception;
use Sun\Contract\Country as CountryContract;

class Country implements CountryContract
{
    /**
     * Countries data.
     *
     * @var array
     */
    protected $countries;

    /**
     * Create a new country instance.
     */
    public function __construct()
    {
        $this->countries = require(__DIR__ . '/../data/countries.php');
    }

    /**
     * Get country name & dialing code by the country ISO 3166-1 Alpha-2 code.
     *
     * @param string|array $countryCode
     *
     * @return array
     */
    public function get($countryCode = null)
    {
        if(is_array($countryCode)) {
            return array_map([$this, 'get'], $countryCode);
        }

        return (gettype($countryCode) === 'string')
                ? $this->{$countryCode}
                : $this->countries;
    }

    /**
     * Get country name by the country ISO 3166-1 Alpha-2 code.
     *
     * @param string $countryCode
     *
     * @return array
     */
    public function getName($countryCode = null)
    {
        $country = $this->{$countryCode};

        return $country['name'];
    }

    /**
     * Get dialing code by the country ISO 3166-1 Alpha-2 code.
     *
     * @param string $countryCode
     *
     * @return array
     */
    public function getDialingCode($countryCode = null)
    {
        $country = $this->{$countryCode};

        return $country['code'];
    }

    /**
     * Dynamically get country name & dialing code by the country ISO 3166-1 Alpha-2 code.
     *
     * @param $countryCode
     *
     * @return array
     * @throws Exception
     */
    public function __get($countryCode)
    {
         if(array_key_exists(strtoupper($countryCode), $this->countries)) {
             return $this->countries[strtoupper($countryCode)];
         }

        throw new Exception("Alpha-2 code [ $countryCode ] not found.");
    }
}
