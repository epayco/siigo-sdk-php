<?php

use Sergio\SdkPhpSiigo\Api\Customer;
use Sergio\SdkPhpSiigo\Model\Customer as CustomerModel;
use Sergio\SdkPhpSiigo\Api\Invoice;

require '../vendor/autoload.php';
require_once 'Client.php';

try {
    $client = new Client();

    // Customer
    $customerApi = new Customer($client);
    $customerModel = createCustomerModel();

    // get client for identification
    $responseCustomer = $customerApi->getAll(['identification' => '141222333', 'page' => 1, 'page_size' => 1]);
    $body = json_decode((string) $responseCustomer->getBody(), true);


    // create client if not exists
    if (!empty($body['results'])) {
        $customer = $body['results'][0];
    } else {
        $responseCreateCustomer = $customerApi->create($customerModel);
        $bodyCreate = json_decode((string) $responseCreateCustomer->getBody(), true);
        $customer = $bodyCreate;
    }

    // update client
    $responseUpdateCustomer = $customerApi->update($customer['id'], $customerModel);
    $bodyUpdateCustomer = json_decode((string) $responseUpdateCustomer->getBody(), true);

    // Invoice
    $invoiceApi = new Invoice($client);

    // create invoice
    $responseCreateInvoice = $invoiceApi->create(createInvoice());
    $boydCreateInvoice = json_decode((string) $responseCreateInvoice->getBody(), true);

    return;
}catch (\GuzzleHttp\Exception\ClientException $e) {
    $responseError = $e->getResponse()->getBody();
    $body = json_decode((string) $responseError, true);
    echo $responseError;
    return;
}catch (Throwable $ex) {
    var_dump($ex->getMessage());
    echo $ex->getMessage();
    return;
}

function createCustomerModel(): CustomerModel
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
        ->setIdentification('141222333')
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

function createInvoice(): \Sergio\SdkPhpSiigo\Model\Invoice
{
    $invoice = new \Sergio\SdkPhpSiigo\Model\Invoice();
    $invoiceDocument = new \Sergio\SdkPhpSiigo\Model\InvoiceDocument();
    $payment = new \Sergio\SdkPhpSiigo\Model\Payment();
    $item = new \Sergio\SdkPhpSiigo\Model\Item();

    $invoice->setDate(new DateTime())
        ->setDocument($invoiceDocument->setId(28220))
        ->setObservations('prueba 1 facturas')
        ->setSeller(62)
        ->setPayments([
            $payment->setValue(1000)
                ->setDueDate(new DateTime())
                ->setId(8057)
        ])->setItems([
            $item->setCode('GAT-02-23')
            ->setDescription('pago de prueba 1')
            ->setPrice(1000)
            ->setQuantity(1)
        ])->setCustomer(createCustomerModel());

    return $invoice;
}