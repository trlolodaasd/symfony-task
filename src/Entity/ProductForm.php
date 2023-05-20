<?php

namespace App\Entity;

class ProductForm
{

     
    public mixed $productList;
    public string $productCode;


    public function setProductList(mixed $productList): void
    {
        $this->productList = $productList;
    }
    public function getProductList(): mixed
    {
        return $this->productList;
    }

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): void
    {
        $this->productCode = $productCode;
    }
}
