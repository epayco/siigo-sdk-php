<?php

namespace Sergio\SdkPhpSiigo\Model;

class Customer
{
    private string $type = 'Customer';

    private string $personType;

    private string $idType;

    private string $identification;

    private string $name;

    private string $lastName;

    private string $commercialName;

    private int $branchOffice = 0;

    private bool $active = true;

    private bool $vatResponsible;

    /**
     * @var array CustomerFiscalResponsibilities
     */
    private array $fiscalResponsibilities;

    private CustomerAddress $address;

    /**
     * @var array Phone[]
     */
    private array $phones;

    /**
     * @var array CustomerContact[]
     */
    private array $contacts;

    private int $sellerId;

    private int $collectorId;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getPersonType(): string
    {
        return $this->personType;
    }

    public function setPersonType(string $personType): static
    {
        $this->personType = $personType;
        return $this;
    }

    public function getIdType(): string
    {
        return $this->idType;
    }

    public function setIdType(string $idType): static
    {
        $this->idType = $idType;
        return $this;
    }

    public function getIdentification(): string
    {
        return $this->identification;
    }

    public function setIdentification(string $identification): static
    {
        $this->identification = $identification;
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

    public function getCommercialName(): string
    {
        return $this->commercialName;
    }

    public function setCommercialName(string $commercialName): static
    {
        $this->commercialName = $commercialName;
        return $this;
    }

    public function getBranchOffice(): int
    {
        return $this->branchOffice;
    }

    public function setBranchOffice(int $branchOffice): static
    {
        $this->branchOffice = $branchOffice;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;
        return $this;
    }

    public function isVatResponsible(): bool
    {
        return $this->vatResponsible;
    }

    public function setVatResponsible(bool $vatResponsible): static
    {
        $this->vatResponsible = $vatResponsible;
        return $this;
    }

    public function getFiscalResponsibilities(): array
    {
        return $this->fiscalResponsibilities;
    }

    public function setFiscalResponsibilities(array $fiscalResponsibilities): static
    {
        $this->fiscalResponsibilities = $fiscalResponsibilities;
        return $this;
    }

    public function getAddress(): CustomerAddress
    {
        return $this->address;
    }

    public function setAddress(CustomerAddress $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getPhones(): array
    {
        return $this->phones;
    }

    public function setPhones(array $phones): static
    {
        $this->phones = $phones;
        return $this;
    }

    public function getContacts(): array
    {
        return $this->contacts;
    }

    public function setContacts(array $contacts): static
    {
        $this->contacts = $contacts;
        return $this;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function setSellerId(int $sellerId): static
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    public function getCollectorId(): int
    {
        return $this->collectorId;
    }

    public function setCollectorId(int $collectorId): static
    {
        $this->collectorId = $collectorId;
        return $this;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}