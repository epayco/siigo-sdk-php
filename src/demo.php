<?php

use Sergio\SdkPhpSiigo\Api\Customer;
use Sergio\SdkPhpSiigo\Model\Customer as CustomerModel;
use Sergio\SdkPhpSiigo\Api\Invoice;
use Sergio\SdkPhpSiigo\Model\Payment as PaymentModel;
use Sergio\SdkPhpSiigo\Api\Product;
use Sergio\SdkPhpSiigo\Model\Product as ProductModel;

require '../vendor/autoload.php';
require_once 'Client.php';

try {
    $client = new Client();

    // Customer --------------------------------------------------------------------------------------------------------
    $customerApi = new Customer($client);
    $customerModel = createCustomerModel();

    // get client for identification
    $responseCustomer = $customerApi->getAll(['identification' => '141222333']);
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

    // Invoice ---------------------------------------------------------------------------------------------------------
    $invoiceApi = new Invoice($client);

    // create invoice
    $responseCreateInvoice = $invoiceApi->create(createInvoice());
    $boydCreateInvoice = json_decode((string) $responseCreateInvoice->getBody(), true);

    // get invoice for name
    $responseInvoice = $invoiceApi->getAll(['name' => 'FV-555-6']);
    $bodyResponseInvoice = json_decode((string) $responseInvoice->getBody(), true);


    // Producto --------------------------------------------------------------------------------------------------------
    $productApi = new Product($client);

    // get product for code
    $responseProduct = $productApi->getAll(['code' => 'GAT-02-24']);
    $bodyResponseCreateProduct = json_decode((string) $responseProduct->getBody(), true);

    // create product
    $responseCreateProduct = $productApi->create(createProduct());
    $bodyResponseCreateProduct = json_decode((string) $responseCreateProduct->getBody(), true);


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
        ->setFiscalResponsibilities([
//            $fiscalResponsibilities->setCode('R-99-PN'),
            $fiscalResponsibilities->setCode('O-47')
        ])->setAddress(
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
    $item = new \Sergio\SdkPhpSiigo\Model\Item();
    $globalRetentions = new \Sergio\SdkPhpSiigo\Model\GlobalRetentions();
    $tax = new \Sergio\SdkPhpSiigo\Model\Tax();

    $invoice->setDate(new DateTime())
        ->setDocument($invoiceDocument->setId(28220))
        ->setObservations('prueba 1 facturas')
        ->setSeller(62)
        ->setPayments([
            (new PaymentModel())->setValue(1900)
                ->setDueDate(new DateTime())
                ->setId(8057),
            (new PaymentModel())->setValue(306.85)
                ->setDueDate(new DateTime())
                ->setId(8058)
        ])->setItems([
            $item->setCode('GAT-02-23')
            ->setDescription('pago de prueba 1')
            ->setPrice(2000)
            ->setQuantity(1)
            ->setTaxes([
                    $tax->setId(1270)
            ])
            ->setDiscount(100)
        ])->setGlobalRetentions([
            $globalRetentions->setId(1284)
        ])->setCustomer(createCustomerModel());

    return $invoice;
}

function createProduct(): ProductModel
{
    return (new ProductModel())
        ->setCode('GAT-02-24')
        ->setName('Plan mensual 100 transacciones')
        ->setAccountGroup(1562);
}