<?php

namespace Epayco\SdkPhpSiigo\Api;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Epayco\SdkPhpSiigo\Api\AbstractApi;
use Epayco\SdkPhpSiigo\Model\Customer as CustomerModel;

final class Customer extends AbstractApi
{
    /**
     * @param array $query ['identification' => '', ...]
     * @return ResponseInterface
     * @throws GuzzleException
     * @see https://siigoapi.docs.apiary.io/#reference/clientes/consultar-cliente/consultar-cliente
     */
    public function getAll(array $query = []): ResponseInterface
    {
        $query = http_build_query($query);

        return $this
            ->getClient()
            ->request('GET', sprintf('%s/customers?%s', self::API_VERSION, $query),
        );
    }

    /**
     * @param CustomerModel $customer
     * @return ResponseInterface
     * @throws GuzzleException
     * @see https://siigoapi.docs.apiary.io/#reference/clientes/crear-cliente/crear-cliente
     */
    public function create(CustomerModel $customer): ResponseInterface
    {
        $data = $this->fillModel($customer);

        return $this
            ->getClient()
            ->request('POST', sprintf('%s/customers', self::API_VERSION), $data);
    }

    /**
     * @param string $id
     * @param CustomerModel $customer
     * @return ResponseInterface
     * @throws GuzzleException
     * @see https://siigoapi.docs.apiary.io/#reference/clientes/actualizar-cliente
     */
    public function update(string $id, CustomerModel $customer): ResponseInterface
    {
        $data = $this->fillModel($customer);

        return $this
            ->getClient()
            ->request('PUT', sprintf('%s/customers/%s', self::API_VERSION, $id), $data);
    }

    private function fillModel(CustomerModel $customer): array
    {
        $name = $customer->getPersonType() === 'Company' ? [$customer->getBusinessName()] : [
            $customer->getName(),
            $customer->getLastName()
        ];

        return [
            'type' => $customer->getType(),
            'person_type' => $customer->getPersonType(),
            'id_type' => $customer->getIdType(),
            'identification' => $customer->getIdentification(),
            'name' => $name,
            'commercial_name' => $customer->getCommercialName(),
            'branch_office' => $customer->getBranchOffice(),
            'active' => $customer->isActive(),
            'vat_responsible' => $customer->isVatResponsible(),
            'fiscal_responsibilities' => array_map(function($responsibility) {
                return ['code' => $responsibility->getCode()];
            }, $customer->getFiscalResponsibilities()),
            'address' => [
                'address' => $customer->getAddress()->getAddress(),
                'city' => [
                    'country_code' => $customer->getAddress()->getCity()->getCountryCode(),
                    'state_code' => $customer->getAddress()->getCity()->getStateCode(),
                    'city_code' => $customer->getAddress()->getCity()->getCityCode(),
                ]
            ],
            'phones' => array_map(function($phone) {
                return [
                    'indicative' => (string) ($phone->getIndicative() ?? '57'),
                    'number' => substr(((string) $phone->getNumber()), 0, 10),
                    'extension' => $phone->getExtension(),
                ];
            }, $customer->getPhones()),
            'contacts' => array_map(function($contact) {
                return [
                    'first_name' => $contact->getFirstName(),
                    'last_name' => $contact->getLastName(),
                    'email' => $contact->getEmail(),
                    'phone' => [
                        'indicative' => (string) ($contact->getPhone()->getIndicative()),
                        'number' => substr(((string) $contact->getPhone()->getNumber()), 0, 10),
                        'extension' => $contact->getPhone()->getExtension(),
                    ]
                ];
            }, $customer->getContacts()),
        ];
    }
}