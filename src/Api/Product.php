<?php

namespace Sergio\SdkPhpSiigo\Api;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Sergio\SdkPhpSiigo\Api\AbstractApi;
use Sergio\SdkPhpSiigo\Model\Product as ProductModel;

final class Product extends AbstractApi
{
    /**
     * @param array $query ['code' => '', ...]
     * @return ResponseInterface
     * @throws GuzzleException
     * @see https://siigoapi.docs.apiary.io/#reference/productos/listar-productos/listar-productos
     */
    public function getAll(array $query = []): ResponseInterface
    {
        $query = http_build_query($query);

        return $this
            ->getClient()
            ->request('GET', sprintf('%s/products?%s', self::API_VERSION, $query),
        );
    }

    /**
     * @param ProductModel $product
     * @return ResponseInterface
     * @throws GuzzleException
     * @see https://siigoapi.docs.apiary.io/#reference/productos/crear-producto/crear-producto
     */
    public function create(ProductModel $product): ResponseInterface
    {
        $data = $this->fillModel($product);

        return $this
            ->getClient()
            ->request('POST', sprintf('%s/products', self::API_VERSION), $data);
    }

    /**
     * @param string $id
     * @param ProductModel $product
     * @return ResponseInterface
     * @throws GuzzleException
     * @see https://siigoapi.docs.apiary.io/#reference/productos/actualizar-producto/actualizar-producto
     */
    public function update(string $id, ProductModel $product): ResponseInterface
    {
        $data = $this->fillModel($product);

        return $this
            ->getClient()
            ->request('PUT', sprintf('%s/products/%s', self::API_VERSION, $id), $data);
    }

    private function fillModel(ProductModel $product): array
    {
        return [
            'code' => $product->getCode(),
            'name' => $product->getName(),
            'account_group' => $product->getAccountGroup(),
            'type' => $product->getType(),
        ];
    }
}