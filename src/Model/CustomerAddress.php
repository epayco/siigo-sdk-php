<?php

namespace Sergio\SdkPhpSiigo\Model;

class CustomerAddress
{
    private string $address;

    private City $city;

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): static
    {
        $this->city = $city;
        return $this;
    }
}