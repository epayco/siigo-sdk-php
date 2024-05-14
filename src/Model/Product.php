<?php

namespace Sergio\SdkPhpSiigo\Model;

/**
 * Class Product
 * For now, only obligatory fields are included
 */
class Product
{
    private string $code;

    private string $name;

    private int $accountGroup;

    private string $type = 'Product';

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getAccountGroup(): int
    {
        return $this->accountGroup;
    }

    public function setAccountGroup(int $accountGroup): static
    {
        $this->accountGroup = $accountGroup;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }
}