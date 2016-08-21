<?php

namespace spec\Sun;

use Exception;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class CountrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sun\Country');
    }

    function it_returns_an_array_of_all_countries_name_and_dialing_code()
    {
        $this->get()->shouldHaveCount(245);
    }

    function it_returns_a_country_name_and_dialing_code_for_the_country_alpha_2_code()
    {
        $this->get('BD')->shouldEqual([
            "code"    => "+880",
            "name"    => "Bangladesh"
        ]);
    }

    function it_returns_an_array_that_contains_two_different_array_of_country_name_and_dialing_code_respect_to_their_alpha_2_code()
    {
        $this->get(['BD', 'US'])->shouldEqual([
            [
                "code"    => "+880",
                "name"    => "Bangladesh"
            ],
            [
                "code"    => "+1",
                "name"    => "United States"
            ]
        ]);
    }

    function it_returns_a_single_array_of_country_name_and_dialing_code_when_the_country_alpha_2_code_accesses_as_property()
    {
        $this->bd->shouldEqual([
            "code"    => "+880",
            "name"    => "Bangladesh"
        ]);
    }

    function it_throws_an_exception_when_the_alpha_2_code_does_not_exist()
    {
        $this->shouldThrow('\Exception')->during('get', ['unknown']);
    }

    function it_returns_a_country_name_by_the_alpha_2_code()
    {
        $this->getName('BD')->shouldReturn('Bangladesh');
    }

    function it_throws_an_exception_when_try_to_get_the_name_of_a_country_by_the_unknown_alpha_2_code()
    {
        $this->shouldThrow('\Exception')->during('getName', ['Unknown']);
    }

    function it_returns_the_dialing_code_of_a_country_by_the_alpha_2_code()
    {
        $this->getDialingCode('BD')->shouldReturn('+880');
    }

    function it_throws_an_exception_when_try_to_get_the_dialing_code_of_a_country_by_the_unknown_alpha_2_code()
    {
        $this->shouldThrow('\Exception')->during('getDialingCode', ['Unknown']);
    }

    function it_should_return_a_country_name_by_the_geo_ip_address()
    {
        $this->getCountryNameByGeoIp('203.202.251.42')->shouldReturn([
            'code' => 'BD',
            'name' => 'Bangladesh'
        ]);
    }

    function it_throws_an_exception_if_the_given_geo_ip_address_is_not_a_valid_geo_ip_adress()
    {
        $this->shouldThrow(
            new Exception("The given geo ip address [ 203 ] is not a valid geo ip address."))
            ->during('getCountryNameByGeoIp', ['203']);
    }

    function it_throws_an_exception_if_the_given_geo_ip_address_does_not_exist()
    {
        $this->shouldThrow(
            new Exception("The given geo ip address [ 0.0.0.0 ] does not exist."))
            ->during('getCountryNameByGeoIp', ['0.0.0.0']);
    }
}
