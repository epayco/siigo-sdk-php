<?php

namespace Epayco\SdkPhpSiigo\Model;

class CustomerAddress
{
    private string $address;

    private City $city;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return $this
     */
    public function setCity(City $city): static
    {
        $this->city = $city;
        return $this;
    }
}