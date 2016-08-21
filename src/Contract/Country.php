<?php
namespace Sun\Contract;

interface Country
{
    /**
     * Get country name & dialing code by Alpha-2 code.
     *
     * @param string|array $countryCode
     *
     * @return array
     */
    public function get($countryCode = null);

    /**
     * Get country name by the given geo ip address.
     *
     * @param string $ip
     *
     * @return array
     * @throws Exception
     */
    public function getCountryNameByGeoIp($ip);

    /**
     * Dynamically get country name & dialing code by Alpha-2 code.
     *
     * @param $countryCode
     *
     * @return array
     */
    public function __get($countryCode);
}