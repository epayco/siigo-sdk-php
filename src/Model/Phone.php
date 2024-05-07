<?php

namespace Sergio\SdkPhpSiigo\Model;

class Phone
{
    private string $indicative = '57';

    private string $number;

    private string $extension = '';

    public function getIndicative(): string
    {
        return $this->indicative;
    }

    public function setIndicative(string $indicative): static
    {
        $this->indicative = $indicative;
        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = substr($number, 0, 10);
        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): static
    {
        $this->extension = $extension;
        return $this;
    }


}