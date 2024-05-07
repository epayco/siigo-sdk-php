<?php

namespace Sergio\SdkPhpSiigo\Model;

class Tax
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}