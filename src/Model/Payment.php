<?php

namespace Epayco\SdkPhpSiigo\Model;

use DateTime;

class Payment
{
    private int $id;

    private float $value;

    private DateTime $dueDate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return $this
     */
    public function setValue(float $value): static
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime $dueDate
     * @return $this
     */
    public function setDueDate(DateTime $dueDate): static
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}