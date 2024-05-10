<?php

namespace Sergio\SdkPhpSiigo\Model;

class City
{
    private string $countryCode;

    private string $stateCode;

    private string $cityCode;

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode(string $countryCode): static
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCityCode(): string
    {
        return $this->cityCode;
    }

    /**
     * @param string $cityCode
     * @return $this
     */
    public function setCityCode(string $cityCode): static
    {
        $this->cityCode = $cityCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateCode(): string
    {
        return $this->stateCode;
    }

    /**
     * @param string $stateCode
     * @return $this
     */
    public function setStateCode(string $stateCode): static
    {
        $this->stateCode = $stateCode;
        return $this;
    }


}