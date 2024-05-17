<?php

namespace Epayco\SdkPhpSiigo\Model;

class GlobalRetentions
{
    private int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return GlobalRetentions
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }
}