<?php

namespace Sergio\SdkPhpSiigo\Model;

class Invoice
{
    private \DateTime $date;

    private InvoiceDocument $document;

    private ?int $seller = null;

    private string $observations;

    /**
     * @var Payment[]
     */
    private array $payments;

    /**
     * @var Item[]
     */
    private array $items;

    private Customer $customer;

    /**
     * @var GlobalRetentions[]
     */
    private array $globalRetentions = [];

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate(\DateTime $date): static
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return InvoiceDocument
     */
    public function getDocument(): InvoiceDocument
    {
        return $this->document;
    }

    /**
     * @param InvoiceDocument $document
     * @return $this
     */
    public function setDocument(InvoiceDocument $document): static
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSeller(): ?int
    {
        return $this->seller;
    }

    /**
     * @param int|null $seller
     * @return $this
     */
    public function setSeller(?int $seller): static
    {
        $this->seller = $seller;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservations(): string
    {
        return $this->observations;
    }

    /**
     * @param string $observations
     * @return $this
     */
    public function setObservations(string $observations): static
    {
        $this->observations = $observations;
        return $this;
    }

    /**
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @param array $payments
     * @return $this
     */
    public function setPayments(array $payments): static
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * @param Payment $payment
     * @return $this
     */
    public function addPayment(Payment $payment): static
    {
        $this->payments[] = $payment;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return $this
     */
    public function setItems(array $items): static
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): static
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer): static
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return GlobalRetentions[]
     */
    public function getGlobalRetentions(): array
    {
        return $this->globalRetentions;
    }

    /**
     * @param array $globalRetentions
     * @return $this
     */
    public function setGlobalRetentions(array $globalRetentions): static
    {
        $this->globalRetentions = $globalRetentions;
        return $this;
    }
}