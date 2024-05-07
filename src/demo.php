<?php

use Sergio\SdkPhpSiigo\Api\Customer;
use Sergio\SdkPhpSiigo\Model\Customer as CustomerModel;

require '../vendor/autoload.php';
require_once 'Client.php';

try {
    $client = new Client();
    $customer = new Customer($client);
    $response = $customer->getAll();
    $body = json_decode((string) $response->getBody(), true);

    $responseCreate = $customer->create(createCustomerModel());
    $bodyCreate = json_decode((string) $responseCreate->getBody(), true);

    return $body;
}catch (\GuzzleHttp\Exception\ClientException $e) {
    $responseError = $e->getResponse()->getBody();
    $body = json_decode((string) $responseError, true);
    echo $responseError;
}catch (Exception $ex) {
    var_dump($ex->getMessage());
    echo $ex->getMessage();
}

function createCustomerModel()
{
    $customer= new CustomerModel();
    $contact = new \Sergio\SdkPhpSiigo\Model\CustomerContact();
    $city = new \Sergio\SdkPhpSiigo\Model\City();
    $phone = new \Sergio\SdkPhpSiigo\Model\Phone();
    $address = new \Sergio\SdkPhpSiigo\Model\CustomerAddress();
    $fiscalResponsibilities = new \Sergio\SdkPhpSiigo\Model\CustomerFiscalResponsibilities();

    $customer->setType('Customer')
        ->setPersonType('Person')
        ->setIdType('13')
        ->setIdentification('123456789')
        ->setName('John')
        ->setLastName('Doe')
        ->setCommercialName('John Doe commercial name')
        ->setVatResponsible(true)
        ->setActive(true)
        ->setFiscalResponsibilities(
            [
                $fiscalResponsibilities->setCode('R-99-PN')
            ]
        )->setAddress(
            $address->setAddress('Calle 123')
                ->setCity(
                    $city->setCountryCode('CO')
                        ->setStateCode('11')
                        ->setCityCode('11001')
                )
        )->setPhones(
            [
                $phone->setIndicative('57')
                    ->setNumber('1234567890')
                    ->setExtension('')
            ]
        )->setContacts(
            [
                $contact->setFirstName('John')
                    ->setLastName('Doe')
                    ->setEmail('johndoe@yopmail.com')
                    ->setPhone(
                        $phone->setIndicative('57')
                            ->setNumber('1234567890')
                            ->setExtension('')
                    )
            ]
        );

    return $customer;
}