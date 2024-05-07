<?php

namespace Sergio\SdkPhpSiigo\Model;

class CustomerFiscalResponsibilities
{
    private string $code = 'R-99-PN';

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }
}