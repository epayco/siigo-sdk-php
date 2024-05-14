<?php

namespace Sergio\SdkPhpSiigo\Model;

use Sergio\SdkPhpSiigo\Model\Tax;

class Item
{
    private string $code;

    private string $description;

    private int $quantity;

    private float $price;

    private float $discount = 0;

    /**
     * @var Tax[]
     */
    private array $taxes = [];

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Item
     */
    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity): static
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Item
     */
    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return Item
     */
    public function setDiscount(float $discount): static
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return Tax[]
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * @param Tax[] $taxes
     */
    public function setTaxes(array $taxes): static
    {
        $this->taxes = $taxes;
        return $this;
    }
}