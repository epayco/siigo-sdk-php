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
     * @var CustomerFiscalResponsibilities[]
     */
    private array $fiscalResponsibilities;

    private CustomerAddress $address;

    /**
     * @var Phone[]
     */
    private array $phones;

    /**
     * @var CustomerContact[]
     */
    private array $contacts;

    private int $sellerId;

    private int $collectorId;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonType(): string
    {
        return $this->personType;
    }

    /**
     * @param string $personType
     * @return $this
     */
    public function setPersonType(string $personType): static
    {
        $this->personType = $personType;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdType(): string
    {
        return $this->idType;
    }

    /**
     * @param string $idType
     * @return $this
     */
    public function setIdType(string $idType): static
    {
        $this->idType = $idType;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentification(): string
    {
        return $this->identification;
    }

    /**
     * @param string $identification
     * @return $this
     */
    public function setIdentification(string $identification): static
    {
        $this->identification = $identification;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommercialName(): string
    {
        return $this->commercialName;
    }

    /**
     * @param string $commercialName
     * @return $this
     */
    public function setCommercialName(string $commercialName): static
    {
        $this->commercialName = $commercialName;
        return $this;
    }

    /**
     * @return int
     */
    public function getBranchOffice(): int
    {
        return $this->branchOffice;
    }

    /**
     * @param int $branchOffice
     * @return $this
     */
    public function setBranchOffice(int $branchOffice): static
    {
        $this->branchOffice = $branchOffice;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return $this
     */
    public function setActive(bool $active): static
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVatResponsible(): bool
    {
        return $this->vatResponsible;
    }

    /**
     * @param bool $vatResponsible
     * @return $this
     */
    public function setVatResponsible(bool $vatResponsible): static
    {
        $this->vatResponsible = $vatResponsible;
        return $this;
    }

    /**
     * @return CustomerFiscalResponsibilities[]
     */
    public function getFiscalResponsibilities(): array
    {
        return $this->fiscalResponsibilities;
    }

    /**
     * @param array $fiscalResponsibilities
     * @return $this
     */
    public function setFiscalResponsibilities(array $fiscalResponsibilities): static
    {
        $this->fiscalResponsibilities = $fiscalResponsibilities;
        return $this;
    }

    /**
     * @return CustomerAddress
     */
    public function getAddress(): CustomerAddress
    {
        return $this->address;
    }

    /**
     * @param CustomerAddress $address
     * @return $this
     */
    public function setAddress(CustomerAddress $address): static
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Phone[]
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * @param array $phones
     * @return $this
     */
    public function setPhones(array $phones): static
    {
        $this->phones = $phones;
        return $this;
    }

    /**
     * @return CustomerContact[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param array $contacts
     * @return $this
     */
    public function setContacts(array $contacts): static
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return int
     */
    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    /**
     * @param int $sellerId
     * @return $this
     */
    public function setSellerId(int $sellerId): static
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCollectorId(): int
    {
        return $this->collectorId;
    }

    /**
     * @param int $collectorId
     * @return $this
     */
    public function setCollectorId(int $collectorId): static
    {
        $this->collectorId = $collectorId;
        return $this;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}