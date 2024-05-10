<?php

namespace Sergio\SdkPhpSiigo\Model;

/**
 *
 */
class CustomerFiscalResponsibilities
{
    private string $code = 'R-99-PN';

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }
}