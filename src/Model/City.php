<?php

namespace Sergio\SdkPhpSiigo\Model;

class City
{
    private string $countryCode;

    private string $stateCode;

    private string $cityCode;

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): static
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getCityCode(): string
    {
        return $this->cityCode;
    }

    public function setCityCode(string $cityCode): static
    {
        $this->cityCode = $cityCode;
        return $this;
    }

    public function getStateCode(): string
    {
        return $this->stateCode;
    }

    public function setStateCode(string $stateCode): static
    {
        $this->stateCode = $stateCode;
        return $this;
    }


}