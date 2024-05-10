<?php

namespace Sergio\SdkPhpSiigo\Model;

class Phone
{
    private string $indicative = '57';

    private string $number;

    private string $extension = '';

    /**
     * @return string
     */
    public function getIndicative(): string
    {
        return $this->indicative;
    }

    /**
     * @param string $indicative
     * @return $this
     */
    public function setIndicative(string $indicative): static
    {
        $this->indicative = $indicative;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): static
    {
        $this->number = substr($number, 0, 10);
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return $this
     */
    public function setExtension(string $extension): static
    {
        $this->extension = $extension;
        return $this;
    }


}