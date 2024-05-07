<?php

namespace Sergio\SdkPhpSiigo\Model;

class Invoice
{
    private \DateTime $date;

    private InvoiceDocument $document;

    private int $seller;

    private string $observations;

    /**
     * @var array Payment[]
     */
    private array $payments;

    /**
     * @var array Item[]
     */
    private array $items;

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getDocument(): InvoiceDocument
    {
        return $this->document;
    }

    public function setDocument(InvoiceDocument $document): static
    {
        $this->document = $document;
        return $this;
    }

    public function getSeller(): int
    {
        return $this->seller;
    }

    public function setSeller(int $seller): static
    {
        $this->seller = $seller;
        return $this;
    }

    public function getObservations(): string
    {
        return $this->observations;
    }

    public function setObservations(string $observations): static
    {
        $this->observations = $observations;
        return $this;
    }

    public function getPayments(): array
    {
        return $this->payments;
    }

    public function setPayments(array $payments): static
    {
        $this->payments = $payments;
        return $this;
    }

    public function addPayment(Payment $payment): static
    {
        $this->payments[] = $payment;
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): static
    {
        $this->items = $items;
        return $this;
    }

    public function addItem(Item $item): static
    {
        $this->items[] = $item;
        return $this;
    }
}